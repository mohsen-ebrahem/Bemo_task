<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\Loan;
class PaymentController extends Controller
{
    public function create(){
        Payment::create(['payment_value'=>10000,'payment_date'=>'2023-4-3','loan'=>1]);
        
    }

    public function store($loanId, Request $request){
        $request->validate(['payment_value'=>'required']);
        if(!PaymentController::isThisPaymentValid($loanId, $request->payment_value))
            return 'this value is not accepted';
        
        Payment::create(['payment_value'=>$request->payment_value,'payment_date'=>Carbon::now(),'loan'=>$loanId]);
        PaymentController::updateLoanPaidValue($loanId, $request->payment_value);
        return redirect('/show-payments/'.$loanId);
    }

    private function updateLoanPaidValue($loanId, $paymentValue){
        $loan=Loan::findOrFail($loanId);
        Loan::where('id','=',$loanId)->update(['paid_value'=>(int)$loan->paid_value+(int)($paymentValue)]);
    }

    private function isThisPaymentValid($loanId, $paymentValue){
        $loan=Loan::findOrFail($loanId);
        $requiredValue=(int)$loan->total_amount/(int)$loan->loan_type;
        return $requiredValue==$paymentValue;
    }
}

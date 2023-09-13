<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Loan;
use App\Models\Payment;
class LoanController extends Controller
{
    public function create(){
       // Loan::create(['loan_value'=>300000,'total_amount'=>240000,'loan_type'=>'24','paid_value'=>0,'loan_date'=>'2023-1-2','expire_loan_date'=>'2023-2-3','loan_owner'=>2]);
}

public function store($customerId,Request $request){
    $request->validate(['loan_value'=>'required','loan_type'=>'required']);
    if((LoanController::sThisValueValid($request->loan_value)))
        return 'loan must be between 100000 and 10000000';
    Loan::create(['loan_value'=>$request->loan_value,'total_amount'=>LoanController::calculateTotalAmount($request->loan_value),'loan_type'=>$request->loan_type,'paid_value'=>0,'loan_date'=>Carbon::now(),'expire_loan_date'=>Carbon::now()->addMonths($request->loan_type),'loan_owner'=>$customerId]);
    return redirect('/user-financial-info/'.$customerId);
}

private function sThisValueValid($loanValue){
    return !($loanValue >= 100000 & $loanValue <= 10000000);
}

private function calculateTotalAmount($loanValue){
    return $loanValue+$loanValue*0.2;
}



public function readRemainedPayments($loanId){
    $loan=Loan::findOrFail($loanId);
    $paymentValue=$loan->total_amount/(int)$loan->loan_type;
    $countOfPayments=Payment::all()->where('loan','=',$loanId)->count();
    if($countOfPayments==$loan->loan_type)return [];
    $currentDate = Carbon::now();
    $remainedPayments=[];
    $lastPayment=Payment::where('loan','=',$loanId)->orderBy('id','desc')->first();
    if(isset($lastPayment))
    $lastPaymentDate = Carbon::create($lastPayment->payment_date);

    if(!isset($lastPayment) or  !($lastPaymentDate->month==$currentDate->month && $lastPaymentDate->year==$currentDate->year)){
         $remainedPayments[]=[$paymentValue,$currentDate->addMonths(0)->month.'/'.$currentDate->year];
        $countOfPayments++;
    }

    for($i=0;$i< $loan->loan_type-$countOfPayments;$i++){
        $remainedPayments[]=[$paymentValue,$currentDate->addMonths(1)->month.'/'.$currentDate->year];
    }
    
   return $remainedPayments;

}




public function readPaidPayments($loanId){
    $payments=Payment::all()->where('loan','=',$loanId);
    if(count($payments)==0)return [];
    $paidPayments=[];
    foreach($payments as $payment){
       $paidPayments[]=[$payment->payment_value,$payment->payment_date];
    }
    return $paidPayments;
}

}

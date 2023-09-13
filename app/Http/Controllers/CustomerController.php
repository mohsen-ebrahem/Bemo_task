<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Loan;
use App\Models\Payment;

use Illuminate\Support\Facades\DB;
class CustomerController extends Controller
{
        public function create(){
                // Customer::create(['full_name'=>'hadi Ebrahem','address'=>'hama']);
        }

        public function store(Request $request){
                $request->validate(['full_name'=>'required','address'=>'required']);
                $customer=Customer::create(['full_name'=>$request->full_name,'address'=>$request->address]);
               return redirect('/add-loan/'.$customer->id);
        }


        public function readFinancialInfo($customerId){
                $financialInfo=[];
                $loans=Loan::all()->where('loan_owner','=',$customerId);
                foreach($loans as $loan){
                        $loanPayments=Payment::all()->where('loan','=',$loan->id);
                        $loan['loan_payments']=$loanPayments;
                        $financialInfo[]=$loan;
                }
                return $financialInfo;
        }

        public function searchForCustomer(Request $request){
                $customers= DB::table('customers')->where('full_name','like','%'.$request->name.'%')->get();
                return view('show-customer',['customers'=>$customers]);
        }

}

<?php

use Illuminate\Support\Facades\Route;
use App\Http\controllers\CustomerController;
use App\Http\controllers\LoanController;
use App\Http\controllers\PaymentController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/create-loan',[LoanController::class,'create']);

Route::post('/create-loan/{customerId}',[LoanController::class,'store']);
Route::post('/create-payment/{loanId}',[PaymentController::class,'store']);

Route::get('/add-customer',function(){
    return view('add-customer');
});
Route::post('/create-customer',[CustomerController::class,'store'])->name('create-customer');

Route::get('/add-loan/{customerId}',function($customerId){
    return view('add-loan',['customerId'=>$customerId]);
});



Route::get('/user-financial-info/{customerId}',function($customerId){
    return view('user-financial-info',['customerId'=>$customerId]);
})->name('financialInfo');

Route::get('/show-payments/{loanId}',function($loanId){
    return view('show-payments',['loanId'=>$loanId]);
});

Route::get('/add-payment/{loanId}',function($loanId){
    return view('add-payment',["loanId"=>$loanId]);
})->name('add-payment');


Route::get('/show-customer',function(){
    return view('show-customer');
});

Route::post('/search-customer',[CustomerController::class,'searchForCustomer'])->name('search');

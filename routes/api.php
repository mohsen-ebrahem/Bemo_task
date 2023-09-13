<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\controllers\CustomerController;
use App\Http\controllers\LoanController;
use App\Http\controllers\PaymentController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::post('/create-customer',[CustomerController::class,'store']);

// Route::post('/create-loan',[LoanController::class,'store']);

// Route::get('/read-financial-info/{loanId}',[CustomerController::class,'readFinancialInfo']);

// Route::get('/read-remained-payments/{loanId}',[LoanController::class,'readRemainedPayments']);
// Route::get('/read-paied-pays/{loanId}',[LoanController::class,'readPaidPayments']);


// Route::get('/search-customer',[CustomerController::class,'searchForCustomer']);

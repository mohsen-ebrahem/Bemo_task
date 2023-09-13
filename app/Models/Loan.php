<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    use HasFactory;
    protected $fillable=['loan_value','total_amount','loan_type','paid_value','loan_date','expire_loan_date','loan_owner'];
}

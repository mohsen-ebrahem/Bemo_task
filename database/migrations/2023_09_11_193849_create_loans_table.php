<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loans', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('loan_value');
            $table->bigInteger('total_amount');
            $table->enum('loan_type', ['12', '24', '48']);
            $table->bigInteger('paid_value');
            $table->date('loan_date');
            $table->date('expire_loan_date');
            $table->unsignedBigInteger('loan_owner');
            $table->foreign('loan_owner')->references('id')->on('customers');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('loans');
    }
};

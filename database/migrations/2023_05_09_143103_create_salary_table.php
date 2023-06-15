<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('salary', function (Blueprint $table) {

            $table->id();

            $table->unsignedInteger('payroll_id')->nullable();
            $table->unsignedInteger('employee_id')->nullable();

            //* Inputted / Filled Amount 

            $table->unsignedDecimal('total_hours_worked')->nullable();
            $table->unsignedDecimal('nd_hours_worked')->nullable();
            $table->unsignedDecimal('total_nd_amount')->nullable();
            $table->unsignedDecimal('absents')->nullable();
            $table->unsignedDecimal('late_minutes')->nullable();
            $table->unsignedDecimal('undertime_minutes')->nullable();
            $table->unsignedDecimal('total_regular_ot_hours')->nullable();
            $table->unsignedDecimal('restday_ot')->nullable();
            $table->unsignedDecimal('special_holiday_hours')->nullable();
            $table->unsignedDecimal('legal_holiday_hours')->nullable();
            $table->unsignedDecimal('legal_holiday_ns_hours')->nullable();


            //* Calculated Amount 

            $table->unsignedDecimal('regular_ot_total_amount')->nullable();
            $table->unsignedDecimal('restday_ot_total_amount')->nullable();


            // Deduction Amount
       
            $table->unsignedDecimal('sss_amount')->nullable();
            $table->unsignedDecimal('philhealth_amount')->nullable();
            $table->unsignedDecimal('pagibig_amount')->nullable();
 
            $table->unsignedDecimal('gross_pay_amount')->nullable();

            $table->unsignedDecimal('total_deduction_amount')->nullable();
            
            $table->unsignedDecimal('netpay_amount')->nullable();


            $table->char('record_status', 1)->default('1');

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('salary');
    }
};

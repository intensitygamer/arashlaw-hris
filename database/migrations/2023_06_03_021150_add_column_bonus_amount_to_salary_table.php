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
        Schema::table('salary', function (Blueprint $table) {
            //
            $table->unsignedDecimal('total_basic_wage_amount')->nullable();

            $table->decimal('backpay_amount')->nullable();
            $table->unsignedInteger('paid_leave_count')->nullable();
            $table->decimal('total_paid_leave_amount')->nullable();
            $table->unsignedDecimal('allowance')->nullable();

            
            $table->unsignedDecimal('total_absent_amount')->nullable();
            $table->unsignedDecimal('total_late_amount')->nullable();
            $table->unsignedDecimal('total_undertime_amount')->nullable();


            $table->unsignedDecimal('special_holiday_amount')->nullable();
            $table->unsignedDecimal('legal_holiday_amount')->nullable();
            $table->unsignedDecimal('legal_holiday_ns_amount')->nullable();
            
            $table->unsignedDecimal('basic_wage')->nullable();

            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('salary', function (Blueprint $table) {
            //
        });
    }
};

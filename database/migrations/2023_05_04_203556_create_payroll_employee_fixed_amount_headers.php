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
        Schema::create('payroll_employee_fixed_amount_headers', function (Blueprint $table) {

            $table->id();

            $table->unsignedInteger('employee_id');
            $table->unsignedInteger('payroll_header_id');
            $table->decimal('amount');
 
            $table->char('record_status', 1)->default('1');

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payroll_employee_fixed_amount_headers');
    }
};

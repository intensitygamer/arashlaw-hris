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
        Schema::create('employees', function (Blueprint $table) {
            
            $table->id();

            // Personal Details

            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('middle_name')->nullable();
            $table->date('birth_date')->nullable();
            $table->char('gender', 1)->nullable();
            $table->string('personal_email')->nullable();
            $table->string('mobile_no')->nullable();
            $table->text('address')->nullable();


            // Work Details

            $table->string('employee_no')->nullable();
            $table->string('company_email')->nullable();
            $table->unsignedInteger('job_position_id')->nullable();
            $table->unsignedInteger('department_id')->nullable();
            $table->time('work_shift_time_in', 4)->nullable();
            $table->time('work_shift_time_out', 4)->nullable();
            $table->unsignedInteger('work_shift_id')->nullable();
            $table->boolean('is_flexible_work_shift')->default(false);
            $table->date('hired_date')->nullable();
            $table->date('start_date')->nullable();
            $table->decimal('basic_wage')->nullable();
            $table->decimal('allowance')->nullable();

            // Government Details
            $table->string('sss_field')->nullable();
            $table->string('pagibig_id')->nullable();
            $table->string('philhealth_id')->nullable();

            // Misc

            $table->timestamp('last_login_date')->nullable();
            $table->ipAddress('last_login_ip')->nullable();
            $table->ipAddress('pc_ip_addr')->nullable();

            $table->char('record_status', 1)->default('1');

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee');
    }
};

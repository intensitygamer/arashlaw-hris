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
        //

        Schema::table('employees', function (Blueprint $table) {
            
            $table->string('last_attendance_log')->nullable();
            $table->timestamp('last_log_attendance_at')->nullable();
            $table->unsignedInteger('user_id')->nullable();;

        });
        
        Schema::table('attendance', function (Blueprint $table) {

            $table->timestamp('sched_time_in')->nullable();
            $table->timestamp('sched_time_out')->nullable();

            $table->timestamp('lunch_in')->nullable();
            $table->timestamp('lunch_out')->nullable();

            $table->timestamp('break1')->nullable();
            $table->timestamp('break2')->nullable();

            $table->timestamp('break1_back')->nullable();
            $table->timestamp('break2_back')->nullable();

            $table->enum('in_status', ['late'])->nullable();
            $table->enum('out_status', ['early', 'overtime'])->nullable();


            $table->string('notes')->nullable();
  
        });


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};

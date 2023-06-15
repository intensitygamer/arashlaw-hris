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
        Schema::create('payroll', function (Blueprint $table) {
            $table->id();
            $table->text('note');
            $table->date('from_date');
            $table->date('to_date');
            
            $table->char('record_status', 1)->default('1');
            $table->string('payroll_type')->nullable();
            $table->enum('status', ['draft', 'publish', 'revised'])->default('draft');
            $table->unsignedInteger('created_by_id');
            $table->timestamps();

        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payroll');
    }
};

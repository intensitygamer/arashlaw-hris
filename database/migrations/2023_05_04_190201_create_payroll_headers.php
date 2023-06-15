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
        Schema::create('payroll_headers', function (Blueprint $table) {
        
            $table->id();

            $table->string('label')->nullable();
            $table->enum('type', ['earning', 'premium', 'deductible'])->nullable();
            $table->enum('amount_type', ['fixed', 'fillable', 'rate'])->nullable();
            $table->decimal('amount_rate')->nullable();
            $table->enum('rate_base_from', ['basic_wage', 'total_earnings', 'gross'])->nullable();

            //$table->decimal('amount_fixed')->nullable();

            $table->unsignedInteger('created_by_id');
            
            $table->char('record_status', 1)->default('1');
            $table->timestamps();

        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payroll_headers');
    }
};

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
        Schema::create('sss_contribution_table', function (Blueprint $table) {

            $table->id();

            $table->decimal('amount_range_from')->nullable();
            $table->decimal('amount_range_to')->nullable();
            $table->decimal('salary_credit')->nullable();
            $table->decimal('employee_share')->nullable();
            $table->decimal('employeer_share')->nullable();
            $table->decimal('total_contribution_amount')->nullable();

            $table->unsignedTinyInteger('created_by_id');
            $table->unsignedTinyInteger('updated_by_id');
            $table->timestamps();
        
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sss_contribution_table');
    }
};

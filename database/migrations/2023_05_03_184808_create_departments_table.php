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
        Schema::create('departments', function (Blueprint $table) {

            $table->id();
            
            $table->string('department_name')->nullable();
            $table->string('department_desc')->nullable();
            $table->unsignedInteger('parent_department_id')->nullable();
            $table->unsignedInteger('department_head_id')->nullable();
            
            $table->char('record_status', 1)->default('1');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('departments');
    }
};

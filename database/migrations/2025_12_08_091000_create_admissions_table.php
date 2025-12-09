<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;


return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
    Schema::create('admissions', function (Blueprint $table) {
    $table->id();
    $table->unsignedBigInteger('patient_id');
    $table->foreign('patient_id')
          ->references('id')
          ->on('patients')
          ->onDelete('cascade');
    $table->string('patient_name')->nullable();
    $table->unsignedBigInteger('doctor_id')->nullable();
    $table->foreign('doctor_id')
            ->references('id')
            ->on('users')
            ->onDelete('cascade');
    $table->string('doctor_name')->nullable();
    $table->unsignedBigInteger('nurse_id')->nullable();
    $table->foreign('nurse_id')
            ->references('id')
            ->on('users')
            ->onDelete('cascade');
    $table->string('nurse_name')->nullable();

        // Ward & bed assignment
    $table->unsignedBigInteger('ward_id')->nullable();   // links to wards table
    $table->string('bed_number')->nullable();            // e.g. "B12"
    $table->foreign('ward_id')
            ->references('id')
            ->on('wards')
            ->onDelete('cascade');
    $table->string('ward_name')->nullable();
    $table->date('admission_date')->default(DB::raw('CURRENT_DATE'));
    $table->text('consultancy_notes')->nullable();
    $table->text('test_results')->nullable();
    $table->dateTime('discharge_date')->nullable();
    $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admissions');
    }
};

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
    Schema::create('drug_administrations', function (Blueprint $table) {
    $table->id();
    $table->foreignId('patient_id')->constrained('patients')->onDelete('cascade');
    $table->unsignedBigInteger('drug_id');
    $table->foreign('drug_id')
          ->references('id')
          ->on('drugs')
          ->onDelete('cascade');
    $table->string('dosage');
    $table->dateTime('date_administered');
    $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('drug_administrations');
    }
};

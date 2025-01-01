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
        Schema::create('counseling_histories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('doctor_id'); // Hanya menggunakan doctor_id
            $table->date('appointment_date'); // Tanggal konseling
            $table->enum('status', ['completed', 'pending', 'cancelled']); // Status konseling
            $table->timestamps();

            // Foreign key constraint
            $table->foreign('doctor_id')->references('id')->on('doctors')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('counseling_histories');
    }
};

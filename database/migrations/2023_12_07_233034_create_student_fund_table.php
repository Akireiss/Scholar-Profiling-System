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
        Schema::create('student_fund', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id');
            $table->string('semester');
            $table->string('school_year');
            $table->unsignedBigInteger('scholarship_id');

           $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
           $table->foreign('scholarship_id')->references('id')->on('scholarships')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_fund');
    }
};

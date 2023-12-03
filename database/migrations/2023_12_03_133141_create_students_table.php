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
        Schema::create('students', function (Blueprint $table) {
        $table->id();
        $table->string('student_id');
        $table->string('lastname');
        $table->string('firstname');
        $table->string('initial');
        $table->string('email');
        $table->string('sex');
        $table->string('civil_status');

        $table->integer('province_id');
        $table->integer('municipal_id');
        $table->integer('barangay_id');

        $table->string('campus');
        $table->unsignedBigInteger('course_id');

        $table->integer('level');
        $table->string('father');
        $table->string('mother');
        $table->string('contact', 11);
        $table->string('student_type');

        $table->string('school_name')->nullable();
        $table->string('lastYear')->nullable();

        $table->string('student_status')->default('0');//0:Active , 1:inactive


        $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');



        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};

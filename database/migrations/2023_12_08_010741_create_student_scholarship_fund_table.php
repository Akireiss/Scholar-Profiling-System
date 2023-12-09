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
        Schema::create('student_scholarship_fund', function (Blueprint $table) {
            $table->id();
            $table->string('fund_name');
            $table->unsignedBigInteger('scholarship_id');


            $table->integer('status')->default('0');
            $table->foreign('scholarship_id')->references('id')
            ->on('scholarships')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_scholarship_fund');
    }
};

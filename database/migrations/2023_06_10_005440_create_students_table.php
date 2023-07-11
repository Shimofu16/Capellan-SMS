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
            $table->string('student_lrn');
            $table->string('student_number')->nullable();
            $table->string('last_name');
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('extension')->nullable();
            $table->string('age');
            $table->string('sex');
            $table->string('birth_date');
            $table->string('contact_num')->nullable();
            $table->string('address');
            $table->string('status')->nullable();// Enrolled, Dropped, Transferred, Graduated, Retained, Promoted.
            $table->boolean('enrollment_status')->default(0);// done or not
            $table->unsignedBigInteger('grade_level_id')->nullable();
            $table->unsignedBigInteger('specialization_id');
            $table->unsignedBigInteger('sy_id')->nullable();
            $table->foreign('grade_level_id')->references('id')->on('grade_levels');
            $table->foreign('specialization_id')->references('id')->on('specializations');
            $table->foreign('sy_id')->references('id')->on('school_years');
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

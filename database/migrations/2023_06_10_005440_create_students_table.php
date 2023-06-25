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
            $table->string('status'); // Enrolled, Dropped, Transferred, Graduated, Retained, Promoted.
            $table->unsignedBigInteger('grade_level_id');
            $table->unsignedBigInteger('strand_id');
            $table->unsignedBigInteger('sy_id');
            $table->unsignedBigInteger('semester_id');

            $table->foreign('grade_level_id')->references('id')->on('grade_levels');
            $table->foreign('strand_id')->references('id')->on('strands');
            $table->foreign('sy_id')->references('id')->on('school_years');
            $table->foreign('semester_id')->references('id')->on('semesters');

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

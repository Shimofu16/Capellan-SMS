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
        Schema::create('subjects', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->string('name');
            $table->integer('unit');
            $table->string('type'); // core, elective, specialization
            $table->unsignedBigInteger('specialization_id');
            $table->unsignedBigInteger('semester_id');
            $table->unsignedBigInteger('grade_level_id');
            $table->foreign('specialization_id')->references('id')->on('specializations');
            $table->foreign('semester_id')->references('id')->on('semesters');
            $table->foreign('grade_level_id')->references('id')->on('grade_levels');            
            $table->timestamps();
            /*
            Core courses are mandatory courses you must study to meet the requirements of your program.
            Electives are courses you can choose,
            allowing you to study topics that interest you. Electives, when added to your core courses,
            make up the total number of units needed to complete your degree.
            In terms of specialization, it refers to the process of concentrating on and becoming an expert in a particular subject or skill.
            */
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subjects');
    }
};

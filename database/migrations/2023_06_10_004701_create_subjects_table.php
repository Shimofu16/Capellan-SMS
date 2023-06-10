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
            $table->string('prerequisite')->default('none'); // none, subject code
            $table->string('type')->default('core'); // core, elective, specialization
            $table->unsignedBigInteger('semester_id');
            $table->foreign('semester_id')->references('id')->on('semesters');
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

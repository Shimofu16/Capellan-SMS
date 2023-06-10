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
            $table->string('image')->nullable();
            $table->string('lrn');
            $table->string('std_num')->nullable();
            $table->string('last_name');
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('extension')->nullable();
            $table->string('civil_status');
            $table->string('age');
            $table->string('sex');
            $table->string('nationality');
            $table->string('b_date');
            $table->string('contact_num')->nullable();
            $table->string('house_num')->nullable();
            $table->string('purok')->nullable();
            $table->string('brgy');
            $table->string('municipality');
            $table->string('province');
            $table->string('f_name')->nullable();
            $table->string('f_occu')->nullable();
            $table->string('m_name')->nullable();
            $table->string('m_occu')->nullable();
            $table->string('g_name');
            $table->string('relationship');
            $table->string('g_contact_num');
            $table->string('g_add');
            $table->string('prev_school');
            $table->string('prev_school_type');
            $table->string('jhs_yrs')->nullable();
            $table->string('year_grad');
            $table->string('gen_ave')->nullable();
            $table->string('prim_grade')->nullable();
            $table->string('prim_grade_yr')->nullable();
            $table->string('intermediate')->nullable();
            $table->string('intermediate_yr')->nullable();
            $table->string('junior_hs')->nullable();
            $table->string('junior_hs_yr')->nullable();
            // $table->string('sr_hs');
            // $table->string('sr_hs_yr');
            // $table->string('college');
            // $table->string('college_yr');
            $table->integer('status');
            $table->timestamps();
            $table->integer('enrollment_id');
            $table->string('shs_yr_graduated')->nullable();
            $table->string('reason_for_dropout')->nullable();
            $table->string('dropout_date')->nullable();
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

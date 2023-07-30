<?php

namespace App\Models\EMS;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentEnrollment extends Model
{
    use HasFactory;
    protected $connection = 'mysql2';
    protected $table = 'std_spc_gl_sy';

    public function specialization(){
        return $this->belongsTo(Specialization::class, 'specialization_id');
    }
    public function gradeLevel(){
        return $this->belongsTo(GradeLevel::class, 'gradelevel_id');
    }
    public function schoolYear(){
        return $this->belongsTo(SchoolYear::class, 'school_year_id');
    }
    public function semester(){
        return $this->belongsTo(Semester::class, 'sem_id');
    }
    public function student(){
        return $this->belongsTo(Student::class, 'student_id');
    }
    public function section(){
        return $this->belongsTo(Section::class, 'section_id');
    }


}

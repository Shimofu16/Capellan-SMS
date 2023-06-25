<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function gradeLevel()
    {
        return $this->belongsTo(GradeLevel::class, 'grade_level_id');
    }
    public function specialization()
    {
        return $this->belongsTo(Specialization::class, 'specialization_id');
    }
    public function schoolYear()
    {
        return $this->belongsTo(SchoolYear::class, 'sy_id');
    }
    public function semester()
    {
        return $this->belongsTo(Semester::class, 'semester_id');
    }
    public function getFullName()
    {
        return $this->last_name . ', ' . $this->first_name . ' ' . $this->middle_name . ' ' . $this->extension;
    }
}

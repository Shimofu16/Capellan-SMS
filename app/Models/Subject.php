<?php

namespace App\Models;

use App\Models\EMS\GradeLevel;
use App\Models\EMS\Semester;
use App\Models\EMS\Specialization;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;
    protected $connection = 'mysql';
    protected $guarded = [];

    public function semester()
    {
        return $this->belongsTo(Semester::class, 'semester_id');
    }

    public function specialization()
    {
        return $this->belongsTo(Specialization::class, 'specialization_id');
    }

    public function gradeLevel()
    {
        return $this->belongsTo(GradeLevel::class, 'grade_level_id');
    }
}

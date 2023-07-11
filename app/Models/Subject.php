<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;
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
        return $this->belongsTo(gradeLevel::class, 'grade_level_id');
    }
}

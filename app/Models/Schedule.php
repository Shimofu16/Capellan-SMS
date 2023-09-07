<?php

namespace App\Models;

use App\Models\EMS\Semester;
use App\Models\EMS\Specialization;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function subject()
    {
        return $this->belongsTo(Subject::class,'subject_id','id');
    }
    public function semester()
    {
        return $this->belongsTo(Semester::class,'semester_id','id');
    }
    public function section()
    {
        return $this->belongsTo(Section::class,'section_id','id');
    }
    public function teacher()
    {
        return $this->belongsTo(Teacher::class,'teacher_id','id');
    }
    public function specialization()
    {
        return $this->belongsTo(Specialization::class,'specialization_id','id');
    }
    public function sy()
    {
        return $this->belongsTo(Sy::class,'sy_id','id');
    }
}

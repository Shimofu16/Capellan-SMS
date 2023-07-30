<?php

namespace App\Models\EMS;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Semester extends Model
{
    use HasFactory;
    protected $connection = 'mysql2';
    protected $table = 'sems';
    protected $guarded = [];

    public function studentEnrollments()
    {
        return $this->hasMany(StudentEnrollment::class, 'sem_id');
    }

    public function subjects()
    {
        return $this->hasMany(Subject::class, 'semester_id');
    }
}

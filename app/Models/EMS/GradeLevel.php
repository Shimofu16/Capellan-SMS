<?php

namespace App\Models\EMS;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GradeLevel extends Model
{
    use HasFactory;
    protected $connection = 'mysql2';
    protected $table = 'grade_levels';
    protected $guarded = [];

    public function studentEnrollments()
    {
        return $this->hasMany(StudentEnrollment::class, 'grade_level_id');
    }

 
}

<?php

namespace App\Models\EMS;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolYear extends Model
{
    use HasFactory;
    protected $connection = 'mysql2';
    protected $table = 'school_years';
    protected $guarded = [];

    public function studentEnrollments()
    {
        return $this->hasMany(StudentEnrollment::class, 'school_year_id');
    }
}

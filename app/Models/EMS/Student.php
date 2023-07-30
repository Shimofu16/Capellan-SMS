<?php

namespace App\Models\EMS;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $connection = 'mysql2';
    protected $table = 'students';
    protected $guarded = [];

    public function enrollment()
    {
        return $this->hasOne(StudentEnrollment::class, 'student_id');
    }
    public function getFullName()
    {
        return $this->last_name . ', ' . $this->first_name . ' ' . $this->middle_name . ' ' . $this->extension;
    }
}

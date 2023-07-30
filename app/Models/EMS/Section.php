<?php

namespace App\Models\EMS;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;
    protected $connection = 'mysql2';
    protected $table = 'sections';

    public function studentEnrollments()
    {
        return $this->hasMany(StudentEnrollment::class, 'section_id');
    }
}

<?php

namespace App\Models\EMS;

use App\Models\Subject;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Specialization extends Model
{
    use HasFactory;
    protected $connection = 'mysql2';
    protected $table = 'specializations';
    protected $guarded = [];

    public  function strand(){
        return $this->belongsTo(Strand::class, 'strand_id');
    }

    public function subjects(){
        return $this->hasMany(Subject::class, 'specialization_id');
    }

    public function studentEnrollments(){
        return $this->hasMany(StudentEnrollment::class, 'specialization_id');
    }
}

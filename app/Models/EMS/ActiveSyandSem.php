<?php

namespace App\Models\EMS;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActiveSyandSem extends Model
{
    use HasFactory;
    protected $connection = 'mysql2';
    protected $table = 'active__school_year_and_sems';
    protected $guarded = [];

    public function sy(){
        return $this->belongsTo(SchoolYear::class,'active_SY_id ','id');
    }
    public function semester(){
        return $this->belongsTo(Semester::class,'active_sem_id ','id');
    }
}

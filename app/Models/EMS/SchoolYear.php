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
    public function schedules()
    {
        return $this->hasMany(Schedule::class, 'sy_id');
    }
    public function activeSy()
    {
        return $this->hasOne(ActiveSyandSem::class, 'active_SY_id');
    }

    public function getActiveSy()
    {
        SchoolYear::query()->with('activeSy')->whereHas('activeSy', function ($query) {
            $query->where('active_SY_id', $this->id);
        })->get();
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Strand extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function specializations()
    {
        return $this->hasMany(Specialization::class, 'strand_id');
    }
    public function students()
    {
        return $this->hasMany(Student::class, 'strand_id');
    }
}

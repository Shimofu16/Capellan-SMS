<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Specialization extends Model
{
    use HasFactory;
    protected $guarded = [];

    public  function strand(){
        return $this->belongsTo(Strand::class, 'strand_id');
    }

    public function subjects(){
        return $this->hasMany(Subject::class, 'specialization_id');
    }
    
}

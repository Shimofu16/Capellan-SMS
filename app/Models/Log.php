<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    use HasFactory;
    private $guarded = [];

    public function users(){
        return $this->hasMany(User::class, 'user_id');
    }
}

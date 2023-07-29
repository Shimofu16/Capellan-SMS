<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentSpecializationFromEMS extends Model
{
    use HasFactory;
    protected $connection = 'mysql2';
    protected $table = 'students'; // change it to your table name
}

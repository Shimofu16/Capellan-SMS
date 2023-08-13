<?php

namespace App\Http\Controllers\Backend\General;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GenerateUserSession extends Controller
{
    public static function GenerateSession($type,$description,$user){
        $user->activities()->create([
            'type' => $type,
            'description' => $description,
        ]);
    }
}

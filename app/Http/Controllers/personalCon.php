<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class personalCon extends Controller
{
    public function show()
    {
       return view('admin.registroUs');
     }
}


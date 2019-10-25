<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class vehiculosCont extends Controller
{
    public function show()
    {
       return view('admin.vehiculo');
     }
}

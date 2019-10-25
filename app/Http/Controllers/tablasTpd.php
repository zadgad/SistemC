<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class tablasTpd extends Controller
{
    public function show()
    {
       return view('admin.tablatpd');
     }
}

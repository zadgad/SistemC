<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class tablasRege extends Controller
{
    public function show()
    {
       return view('admin.tablareg');
     }
}

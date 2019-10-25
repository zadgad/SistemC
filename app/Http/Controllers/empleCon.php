<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class empleCon extends Controller
{
    public function show()
   {
      return view('admin.jobs');
    }
}

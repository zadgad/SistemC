<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class index extends Controller
{

    public function Index()
   {
      return view('categoria.index');
    }
}

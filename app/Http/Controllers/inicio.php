<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class inicio extends Controller
{
    public function index()
    {
        return view('layouts/page_template/auth');
    }
}

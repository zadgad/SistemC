<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rol;
class inicio extends Controller
{
    public function index()
    {
        // return view('layouts/page_template/auth');
        $data=session()->get('rol');

        return view('dashboard');

    }
}

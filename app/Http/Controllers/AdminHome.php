<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminHome extends Controller
{
    public function home(){
        return view('adminPage');
    }
}

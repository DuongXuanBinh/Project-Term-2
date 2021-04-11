<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function homeIndex(){
        return view('index');
    }
    public function flightIndex(){
        return view('Flight status');
    }
}

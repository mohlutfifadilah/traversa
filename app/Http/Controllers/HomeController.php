<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function rute(){
        return view('rute');
    }

    public function armada(){
        return view('armada');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        return view('landing');
    }
    public function tc(){
        return view('tc');
    }
    public function privacy(){
        return view('privacy');
    }
}

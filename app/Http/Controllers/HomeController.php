<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }
    
    public function scholarships()
    {
        return view('scholarships');
    }
    
    public function about()
    {
        return view('about');
    }
    
    public function cpl()
    {
        return view('programs.cpl');
    }
}
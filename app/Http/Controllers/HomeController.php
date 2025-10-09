<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class HomeController extends Controller
{
    public function index()
    {
        $hero_text = "“ALL OUR DREAMS CAN COME TRUE,";
        $hero_subtext = "If we have the courage to pursue them.”";
        return view('home', compact('hero_text', 'hero_subtext'));
    }

    public function about()
    {
        return view('about');
    }

    public function courses()
    {
        return view('courses');
    }

    public function elements()
    {
        return view('elements');
    }

    public function blogShow()
    {
        // Assuming you have a Blog model to fetch blog details from the database
        // $blog = \App\Models\Blog::where('slug', $slug)->firstOrFail();
        // return view('blog.show', compact('blog'));
        echo "Displaying blog post with slug: ";
    }
}
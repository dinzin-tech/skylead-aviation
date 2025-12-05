<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GlobalDestination;

class GlobalDestinationController extends Controller
{
    public function show($slug)
    {
        $destination = GlobalDestination::where('slug', $slug)->active()->firstOrFail();
        return view('global-destinations.show', compact('destination'));
    }

    public function index()
    {
        $destinations = GlobalDestination::active()->ordered()->get();
        return view('global-destinations.index', compact('destinations'));
    }
}
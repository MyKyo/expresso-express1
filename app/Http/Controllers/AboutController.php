<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Team;

class AboutController extends Controller
{
    public function show()
    {
        $about = About::where('is_published', true)->latest('id')->first();
        abort_if(!$about, 404);
        
        $teams = Team::published()->ordered()->get();
        
        return view('about.show', compact('about', 'teams'));
    }
}



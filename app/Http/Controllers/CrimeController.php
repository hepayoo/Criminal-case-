<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;

use Illuminate\Http\Request;
use App\Models\Crime;



class CrimeController extends Controller
{
    public function store(Request $request)
    {
        // Validate incoming request data
        $request->validate([
            'title' => 'required',
            'file' => 'required | image', // File upload is optional, must be an image
            'biography' => 'required',
            'murders' => 'required',
            'arrests' => 'required',
            'sources' => 'required',
        ]);

        // Generate a unique slug
        $title = $request->title;
        
        if (!Crime::count()) {
            $postId = 1;
        } else {
            $crimeId = Crime::latest()->first()->id + 1;
        }
        $slug = Str::slug($title, '-') . '-' . $crimeId;
        $user_id = auth()->user()->id;
        $biography = $request->input('biography');
        $murders = $request->input('murders');
        $arrests = $request->input('arrests');
        $sources = $request->input('sources');
        $imagePath = 'storage/' . $request->file('file')->store('crimesImages', 'public');

        // Create and save the crime record
        $crime = new Crime();
        $crime->title = $title;
        $crime->user_id = $user_id;
        $crime->biography = $biography;
        $crime->murders = $murders;
        $crime->arrests = $arrests;
        $crime->sources = $sources;
        $crime->slug = $slug;
        $crime->imagePath = $imagePath;
        $crime->save();

        
      
    }
}

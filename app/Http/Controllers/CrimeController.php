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
            'desc'=>'required',
            'file' => 'required|image|mimes:jpg,jpeg,png,gif,svg|max:2048', // File upload is optional, must be an image
            'biography' => 'required',
            'murders' => 'required',
            'arrests' => 'required',
            'sources' => 'required',
        ]);

        // Generate a unique slug
        $title = $request->title;
        
        $latestCrime = Crime::latest()->first();
        $crimeId = $latestCrime ? $latestCrime->id + 1 : 1;
        $slug = Str::slug($title, '-') . '-' . $crimeId;
        $user_id = auth()->user()->id;
        $biography = $request->input('biography');
        $desc = $request->input('desc');
        $murders = $request->input('murders');
        $arrests = $request->input('arrests');
        $sources = $request->input('sources');
        $imagePath = 'storage/' . $request->file('file')->store('crimesImages', 'public');

        // Create and save the crime record
        $crime = new Crime();
        $crime->title = $title;
        $crime->user_id = $user_id;
        $crime->biography = $biography;
        $crime->desc = $desc;
        $crime->murders = $murders;
        $crime->arrests = $arrests;
        $crime->sources = $sources;
        $crime->slug = $slug;
        $crime->imagePath = $imagePath;
        $crime->save();

        
      
    }
}
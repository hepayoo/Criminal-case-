<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;

use Illuminate\Http\Request;
use App\Models\Crime;
use App\Http\Resources\CrimeResource;
use Illuminate\Support\Facades\File;



class CrimeController extends Controller
{
    public function index(Request $request)
    {
      if ($request->search) {
            return  CrimeResource::collection(Crime::where('title', 'like', '%' . $request->search . '%')
                ->orWhere('desc', 'like', '%' . $request->search . '%')->latest()->paginate(1)->withQueryString());
        }

        return CrimeResource::collection(Crime::latest()->paginate(1));
    }
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


    public function show(Crime $crime)
    {
     
        return new CrimeResource($crime);
    }

    public function update(Request $request, Crime $crime)
    {
      

  
    
        $request->validate([
            'title' => 'required',
            'file' => 'nullable|image',
            'desc' => 'required',
            'biography' => 'required',
            'murders' => 'required',
            'arrests' => 'required',
            'sources' => 'required',
        ]);
    
        // Only regenerate slug if title has changed
        if ($crime->title !== $request->title) {
            $title = $request->title;
            $slug = Str::slug($title, '-') . '-' . $crime->id;
            $crime->slug = $slug;
        }
    
        $crime->title = $request->input('title');
        $crime->desc = $request->input('desc');
        $crime->biography = $request->input('biography');
        $crime->murders = $request->input('murders');
        $crime->arrests = $request->input('arrests');
        $crime->sources = $request->input('sources');
    
        // If there's a new file, delete the old one and store the new image
        if ($request->file('file')) {
            File::delete(public_path($crime->imagePath)); // Safely delete old image
            $imagePath = 'storage/' . $request->file('file')->store('crimesImages', 'public');
            $crime->imagePath = $imagePath;
        }
    
        $crime->save();
    
        return response()->json(['message' => 'Crime updated successfully', 'data' => new CrimeResource($crime)], 200);
    }

    public function destroy(Crime $crime)
    {
     

        return $crime->delete();
    }
    
}
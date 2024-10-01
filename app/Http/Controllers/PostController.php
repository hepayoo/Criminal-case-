<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Str;
use App\Http\Resources\PostResource;


class PostController extends Controller
{

    public function index(Request $request)
    {
      if ($request->search) {
            return  PostResource::collection(Post::where('victim_name', 'like', '%' . $request->search . '%')
                ->orWhere('full_name', 'like', '%' . $request->search . '%')->latest()->paginate(4)->withQueryString());
        }

        return PostResource::collection(Post::latest()->paginate(4));
    }
    public function store(Request $request)
    {
        // Validation rules for text fields and file uploads
        $request->validate([
            'full_name' => 'required|string',
            'victim_name' => 'required|string',
            'description' => 'required|string',
            'victim_image' => 'nullable|image',
            'case_image.*' => 'nullable|image',
            'case_video.*' => 'nullable|mimes:mp4,mov,avi',
            'case_file.*' => 'nullable|mimes:pdf,doc,docx',
        ]);

        // Generate a unique slug for the post
        $slug = Str::slug($request->victim_name, '-');
        $baseSlug = $slug;
        $count = 1;

        while (Post::where('slug', $slug)->exists()) {
            $slug = $baseSlug . '-' . $count;
            $count++;
        }

        $user_id = auth()->user()->id;

        // Handle file uploads
        $post = new Post();
        $post->full_name = $request->full_name;
        $post->victim_name = $request->victim_name;
        $post->description = $request->description;
        $post->user_id = $user_id;
        $post->slug = $slug;

        if ($request->hasFile('victim_image')) {
            $post->victim_image = $request->file('victim_image')->store('postsImages', 'public');
        }

        if ($request->hasFile('case_image')) {
            $caseImagesPaths = [];
            foreach ($request->file('case_image') as $file) {
                $caseImagesPaths[] = $file->store('caseImages', 'public');
            }
            $post->case_image = json_encode($caseImagesPaths);
        }

        if ($request->hasFile('case_video')) {
            $caseVideosPaths = [];
            foreach ($request->file('case_video') as $file) {
                $caseVideosPaths[] = $file->store('caseVideos', 'public');
            }
            $post->case_video = json_encode($caseVideosPaths);
        }

        if ($request->hasFile('case_file')) {
            $caseFilesPaths = [];
            foreach ($request->file('case_file') as $file) {
                $caseFilesPaths[] = $file->store('caseFiles', 'public');
            }
            $post->case_file = json_encode($caseFilesPaths);
        }

        // Save post
        try {
            $post->save();
            return response()->json([
                'success' => true,
                'message' => 'Post created successfully',
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'An error occurred: ' . $e->getMessage(),
            ], 500);
        }
    }
    public function show(Post $post)
    {
        return new PostResource($post);
    }
}

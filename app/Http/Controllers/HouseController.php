<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\PostResource;
use App\Models\Post;
class HouseController extends Controller
{
    public function index()
    {
        return PostResource::collection(Post::latest()->take(4)->get());
    }
}

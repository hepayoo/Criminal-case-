<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        // Example response; replace with actual logic
        return response()->json(['message' => 'Welcome to the Admin Dashboard']);
    }
}

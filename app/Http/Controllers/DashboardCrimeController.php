<?php

namespace App\Http\Controllers;

use App\Http\Resources\CrimeResource;
use App\Models\Crime;
use Illuminate\Http\Request;

class DashboardCrimeController extends Controller
{
    public function index()
    {
        return CrimeResource::collection(
            Crime::where('user_id', auth()->user()->id)->latest()->get()
        );
    }
}
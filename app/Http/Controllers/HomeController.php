<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\CrimeResource;
use App\Models\Crime;

class HomeController extends Controller
{
    public function index()
    {
        return CrimeResource::collection(Crime::latest()->take(4)->get());
    }
}

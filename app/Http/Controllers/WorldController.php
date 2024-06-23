<?php

namespace App\Http\Controllers;
use App\Models\World;

use Illuminate\Http\Request;

class WorldController extends Controller
{
    public function index()
    {
        return World::with('spirits','groups.characters')->get();
    }
}

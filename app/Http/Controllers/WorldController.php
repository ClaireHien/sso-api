<?php

namespace App\Http\Controllers;
use App\Models\World;
use App\Models\Spirit;

use Illuminate\Http\Request;

class WorldController extends Controller
{
    public function index()
    {
        return World::with('spirits','groups.characters.user')->get();
    }
    
    public function spirit(string $worldId)
    {
        return Spirit::where('world_id', $worldId)->get();
    }
}

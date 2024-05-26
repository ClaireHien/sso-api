<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Craft;
use App\Models\CraftSkill;

class CraftSkillController extends Controller
{
    public function index()
    {
        return CraftSkill::with('craft')->get();
    }
}

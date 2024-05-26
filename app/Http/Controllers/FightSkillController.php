<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Stereotype;
use App\Models\FightSkill;


class FightSkillController extends Controller
{
    
    public function index()
    {
        return FightSkill::with('stereotype')->get();
    }
}

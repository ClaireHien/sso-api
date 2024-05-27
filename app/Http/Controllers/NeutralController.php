<?php

namespace App\Http\Controllers;
use App\Models\NeutralSkill;


use Illuminate\Http\Request;

class NeutralController extends Controller
{
    public function index()
    {
        return NeutralSkill::get();
    }
}

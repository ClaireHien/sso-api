<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Craft;
use App\Models\CraftTable;
use App\Models\Material;
use App\Models\CraftSkill;

class CraftController extends Controller
{
    public function craftTable()
    {
        return CraftTable::with('craft','material')->get();
    }
    
    public function craftSkill()
    {
        return CraftSkill::with('craft')->get();
    }
}

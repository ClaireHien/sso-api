<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Craft;
use App\Models\CraftTable;
use App\Models\Material;
use App\Models\CraftSkill;
use App\Models\MaterialTable;

class CraftController extends Controller
{
    public function craftTable()
    {
        return CraftTable::with('craft','material')
        ->whereHas('material', function ($query) {
            $query->where('display', 1);
        })
        ->get();
    }
    
    public function craftSkill()
    {
        return CraftSkill::with('craft')->get();
    }

    public function material()
    {
        return Material::with('typeMaterial','materialTable')
        ->where('display', 1)
        ->get();
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\NeutralSkill;
use App\Models\Craft;
use App\Models\CraftSkill;
use App\Models\Tree;
use App\Models\CraftTable;
use App\Models\Material;
use App\Models\Stereotype;
use App\Models\Statistic;
use App\Models\Status;
use App\Models\TypeDamage;
use App\Models\TypeSkill;
use App\Models\TypeTree;


class TreeController extends Controller
{
    
    public function weapon()
    {
        return Tree::with('TypeDamage','TypeTree', 'Skill','TypeSkill','Stereotype','Range','Status','Statistic')
        ->where('typeTree', 1)
        ->get();
    }
    public function magic()
    {
        return Tree::with('TypeDamage','TypeTree', 'Skill','TypeSkill','Stereotype','Range','Status','Statistic')
        ->where('typeTree', 1)
        ->get();
    }
}

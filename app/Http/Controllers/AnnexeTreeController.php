<?php

namespace App\Http\Controllers;
use App\Models\Range;
use App\Models\Stereotype;
use App\Models\TypeDamage;
use App\Models\Statistic;
use App\Models\Status;
use App\Models\Group;
use App\Models\Spirit;

use Illuminate\Http\Request;

class AnnexeTreeController extends Controller
{
    
    public function range()
    {
        return Range::get();
    }
    public function stereotype()
    {
        return stereotype::get();
    }
    public function typeDamage()
    {
        return typeDamage::get();
    }
    public function status()
    {
        return Status::get();
    }
    public function statisticPhysic()
    {
        return Statistic::
        where('type', 1)
        ->get();
    }
    public function statisticMagic()
    {
        return Statistic::
        where('type', 2)
        ->get();
    }
    public function group()
    {
        return Group::with('world.spirits')->get();
    }
}

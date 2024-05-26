<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Craft;
use App\Models\CraftTable;
use App\Models\Material;

 
class CraftController extends Controller
{
    public function index()
    {
        return CraftTable::with('craft','material')->get();
    }
}

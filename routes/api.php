<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TreeController;
use App\Http\Controllers\NeutralController;
use App\Http\Controllers\FightSkillController;
use App\Http\Controllers\CraftController;


Route::get('/weapon', [TreeController::class, 'weapon']);
Route::get('/magic', [TreeController::class, 'magic']);
Route::get('/neutral', [NeutralController::class, 'index']);
Route::get('/fight', [FightSkillController::class, 'index']);
Route::get('/craft-skill', [CraftController::class, 'craftSkill']);
Route::get('/craft', [CraftController::class, 'craftTable']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

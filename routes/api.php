<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TreeController;
use App\Http\Controllers\NeutralController;
use App\Http\Controllers\FightSkillController;
use App\Http\Controllers\CraftController;
use App\Http\Controllers\AnnexeTreeController;
use App\Http\Controllers\WorldController;
use App\Http\Controllers\CharacterController;
use App\Http\Controllers\UserController;
 

Route::get('/weapon', [TreeController::class, 'weapon']);
Route::get('/magic', [TreeController::class, 'magic']);
Route::get('/neutral', [NeutralController::class, 'index']);
Route::get('/fight', [FightSkillController::class, 'index']);
Route::get('/craft-skill', [CraftController::class, 'craftSkill']);
Route::get('/craft', [CraftController::class, 'craftTable']);
Route::get('/material', [CraftController::class, 'material']);

Route::get('/range', [AnnexeTreeController::class, 'range']);
Route::get('/stereotype', [AnnexeTreeController::class, 'stereotype']);
Route::get('/status', [AnnexeTreeController::class, 'status']);
Route::get('/type-damage', [AnnexeTreeController::class, 'typeDamage']);
Route::get('/statistic-physic', [AnnexeTreeController::class, 'statisticPhysic']);
Route::get('/statistic-magic', [AnnexeTreeController::class, 'statisticMagic']);
Route::get('/groups', [AnnexeTreeController::class, 'group']);

Route::get('/spirits/{worldId}', [WorldController::class, 'spirit']);
Route::get('/world',[WorldController::class,'index']);

Route::get('/login',[UserController::class,'connexion'])->name('login');
Route::post('/login',[UserController::class,'login']);
Route::post('/register',[UserController::class,'store']);


Route::group(['middleware' => 'auth:sanctum'], function () {

    Route::post('/character/{userId}',[CharacterController::class,'store']);
    Route::get('/character/{id}',[CharacterController::class,'show']);

    Route::get('/character',[CharacterController::class,'index']);
    Route::put('/character/{id}',[CharacterController::class,'update']);
    Route::delete('/character/{id}',[CharacterController::class,'destroy']);
    
    Route::get('/user/{id}',[UserController::class,'show']);
    Route::put('/user/{id}',[UserController::class,'update']);


});
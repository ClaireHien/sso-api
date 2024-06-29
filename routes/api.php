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
    Route::put('/character/{id}/global',[CharacterController::class,'global']);
    Route::put('/character/{id}/spirit',[CharacterController::class,'spirit']);
    Route::put('/character/{id}/addXP',[CharacterController::class,'addXP']);
    Route::put('/character/{id}/dead',[CharacterController::class,'dead']);
    Route::put('/character/{id}/stuff',[CharacterController::class,'stuff']);
    Route::put('/character/{id}/main-stat',[CharacterController::class,'mainStat']);
    Route::put('/character/{id}/physical-stat',[CharacterController::class,'physicalStat']);
    Route::put('/character/{id}/magic-stat',[CharacterController::class,'magicStat']);
    Route::put('/character/{id}/pv/{action}',[CharacterController::class,'pv']);
    Route::put('/character/{id}/pv-status/{pv}',[CharacterController::class,'pvStatus']);
    Route::put('/character/{id}/star/{star}',[CharacterController::class,'star']);
    Route::put('/character/{id}/money/{money}',[CharacterController::class,'money']);
    Route::put('/character/{id}/upgrade-fight/{idSkill}',[CharacterController::class,'upgradeFight']);
    Route::put('/character/{id}/update-skill/{type}/{idSkill}',[CharacterController::class,'updateSkill']);
    Route::put('/character/{id}/inventory/{type}/{idItem}/{addSub}',[CharacterController::class,'inventoryQte']);
    Route::put('/character/{id}/add-item',[CharacterController::class,'addItem']);
    Route::put('/character/{id}/status/{type}/{idStatus}',[CharacterController::class,'status']);
    Route::put('/character/{id}/statistic/{type}/{pc}/{free}',[CharacterController::class,'statistic']);
    Route::put('/character/{id}/add-tree/{treeId}',[CharacterController::class,'addTree']);
    Route::put('/character/{id}/add-neutral-skill/{type}/{idSkill}',[CharacterController::class,'addNeutralSkill']);

    Route::delete('/character/{id}',[CharacterController::class,'destroy']);
    
    Route::get('/user/{id}',[UserController::class,'show']);
    Route::put('/user/{id}',[UserController::class,'update']);


});
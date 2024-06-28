<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CharacterFightSkill extends Model
{
     protected $table = 'character_fight_skill';

    use HasFactory;
    
    public $timestamps = false;
    protected $fillable = [
        'character_id', 
        'fight_skill_id',
        'upgrade_unlock'
    ];

    
    public function character(){
        return $this->belongsTo(Character::class);
    }
    
    public function fightSkill(){
        return $this->belongsTo(FightSkill::class);
    }
}

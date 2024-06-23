<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CharacterNeutralSkill extends Model
{
    use HasFactory;
    
    public $timestamps = false;
    protected $fillable = [
        'character_id', 
        'neutral_skill_id'
    ];

    
    public function character(){
        return $this->belongsTo(Character::class);
    }
    
    public function neutralSkill(){
        return $this->belongsTo(NeutralSkill::class);
    }
    
}

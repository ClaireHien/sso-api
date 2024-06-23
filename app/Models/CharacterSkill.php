<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CharacterSkill extends Model
{
    use HasFactory;
    
    public $timestamps = false;
    protected $fillable = [
        'character_id', 
        'skill_id',
        'upgrade_unlock',
        'ultimate_upgrade_unlock'
    ];

    
    public function character(){
        return $this->belongsTo(Character::class);
    }
    
    public function skill(){
        return $this->belongsTo(Skill::class);
    }
    
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CharacterCraftSkill extends Model
{
    use HasFactory;
    protected $table = 'character_craft_skill';
    
    public $timestamps = false;
    protected $fillable = [
        'character_id', 
        'craft_skill_id'
    ];

    
    public function character(){
        return $this->belongsTo(Character::class);
    }
    
    public function craft(){
        return $this->belongsTo(Craft::class);
    }
    
}

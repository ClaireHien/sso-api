<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CharacterPersonnalSkill extends Model
{
    protected $table = 'character_personnal_skill';
    use HasFactory;
    
    public $timestamps = false;
    protected $fillable = [
        'character_id', 
        'personnal_skill_id',
    ];

    
    public function character(){
        return $this->belongsTo(Character::class);
    }
    
    public function personnalSkill(){
        return $this->belongsTo(PersonnalSkill::class);
    }
    
}

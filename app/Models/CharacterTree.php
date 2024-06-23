<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CharacterTree extends Model
{
    
    use HasFactory;
    
    public $timestamps = false;
    protected $fillable = [
        'character_id', 
        'tree_id',
        'innate',
        'ultimate_unlock'
    ];

    
    public function character(){
        return $this->belongsTo(Character::class);
    }
    
    public function tree(){
        return $this->belongsTo(Tree::class);
    }
    
}

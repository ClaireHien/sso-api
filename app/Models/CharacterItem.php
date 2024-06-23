<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CharacterItem extends Model
{
    use HasFactory;
    
    public $timestamps = false;
    protected $fillable = [
        'character_id', 
        'item_id'
    ];

    
    public function character(){
        return $this->belongsTo(Character::class);
    }
    
    public function item(){
        return $this->belongsTo(Item::class);
    }
    
}

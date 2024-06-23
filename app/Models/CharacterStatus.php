<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CharacterStatus extends Model
{
    use HasFactory;
    
    public $timestamps = false;
    protected $fillable = [
        'character_id', 
        'status_id',
        'quantity'
    ];

    
    public function character(){
        return $this->belongsTo(Character::class);
    }
    
    public function status(){
        return $this->belongsTo(Status::class);
    }
    
}

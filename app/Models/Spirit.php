<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spirit extends Model
{
    use HasFactory;
    
    public $timestamps = false;
    protected $fillable = [
        'name', 
        'description',
        'quest_1',
        'skill',
        'quest_2',
        'skill_upgrade',
        'quest_3',
        'ultimate_upgrade'
    ];
    
    public function world(){
        return $this->belongsTo(World::class);
    }
    
    public function characters()
    {
        return $this->hasMany(Character::class);
    }
}

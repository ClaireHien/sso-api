<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'name'
    ];
    
    public function characters()
    {
        return $this->hasMany(Character::class);
    }
    public function world(){
        return $this->belongsTo(World::class);
    }
}

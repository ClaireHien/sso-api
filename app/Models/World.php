<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class World extends Model
{
    use HasFactory;
    
    public $timestamps = false;
    protected $fillable = [
        'name', 
        'description',
        'image'
    ];
    
    public function groups()
    {
        return $this->hasMany(Group::class);
    }
    public function spirits()
    {
        return $this->hasMany(Spirit::class);
    }
}

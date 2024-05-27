<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FightSkill extends Model
{
    use HasFactory;
     
    public $timestamps = false;
    protected $fillable = [
        'name', 
        'description',
        'upgrade'
    ];

    public function stereotypes()
    { 
        return $this->belongsToMany(Stereotype::class);
    }
}

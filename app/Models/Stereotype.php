<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stereotype extends Model
{
    use HasFactory;
     
    public $timestamps = false;
    protected $fillable = [
        'label'
    ];
    
    public function fightSkill()
    {
        return $this->belongsToMany(FightSkill::class);
    }
    
    public function tree()
    {
        return $this->belongsToMany(Tree::class);
    }
}

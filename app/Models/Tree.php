<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tree extends Model
{
    use HasFactory;
    
     
    public $timestamps = false;
    protected $fillable = [
        'name',
        'description',
        'dice',
        'ultimate_skill',
        'ultimate_skill_description',
        'passive_innate',
        'passive_innate_description'
    ];
    
    public function typeTree(){
        return $this->belongsTo(TypeTree::class);
    }
    
    public function typeDamage(){
        return $this->belongsTo(TypeDamage::class);
    }
    
    public function range(){
        return $this->belongsTo(Range::class);
    }
    
    public function stereotype()
    {
        return $this->belongsToMany(Stereotype::class);
    }
}

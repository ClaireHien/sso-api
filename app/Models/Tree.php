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
        'passive_innate_description',
        'range_id',
        'type_damage_id',
        'type_tree_id',
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
    
    public function stereotypes(){
        return $this->belongsToMany(Stereotype::class);
    }
    public function skills(){
        return $this->HasMany(Skill::class);
    }
    public function statuses(){
        return $this->belongsToMany(Status::class);
    }
    
    
    public function statistics(){
        return $this->belongsToMany(Statistic::class);
    }
}

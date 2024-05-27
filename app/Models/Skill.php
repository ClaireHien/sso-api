<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    use HasFactory;
     
    public $timestamps = false;
    protected $fillable = [
        'name',
        'description',
        'upgrade',
        'ultimate_upgrade'
    ];
    
    public function TypeSkill(){
        return $this->belongsTo(TypeSkill::class);
    }
    
    public function tree(){
        return $this->belongsTo(Tree::class);
    }
    public function statuses(){
        return $this->belongsToMany(Status::class);
    }
    
    
    public function statistics(){
        return $this->belongsToMany(Statistic::class);
    }
}

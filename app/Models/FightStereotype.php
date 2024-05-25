<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FightStereotype extends Model
{
    use HasFactory;
    
    protected $table ="fight_stereotype";
    
    public $timestamps = false;
    
    protected $fillable = ['stereotype_id', 'fight_skill_id'];
    
    public function stereotype(){
        return $this->belongsTo(Stereotype::class);
    }
    public function fight_skill(){
        return $this->belongsTo(FightSKill::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SkillStatus extends Model
{
    use HasFactory;
    
    protected $table ="skill_status";
    
    public $timestamps = false;
    
    protected $fillable = ['skill_id', 'status_id'];
    
    public function skill(){
        return $this->belongsTo(Skill::class);
    }
    public function status(){
        return $this->belongsTo(Status::class);
    }
}

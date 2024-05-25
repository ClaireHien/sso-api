<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SkillStatistic extends Model
{
    use HasFactory;
    
    protected $table ="skill_statistic";
    
    public $timestamps = false;
    
    protected $fillable = ['skill_id', 'statistic_id'];
    
    public function skill(){
        return $this->belongsTo(Skill::class);
    }
    public function statistic(){
        return $this->belongsTo(Statistic::class);
    }
}

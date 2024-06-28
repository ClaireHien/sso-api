<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CharacterStatistic extends Model
{
    use HasFactory;
    
    protected $table = 'character_statistic';
    public $timestamps = false;
    protected $fillable = [
        'character_id', 
        'statistic_id',
        'value',
        'bonus'
    ];

    
    public function character(){
        return $this->belongsTo(Character::class);
    }
    
    public function statistic(){
        return $this->belongsTo(Statistic::class);
    }
    
}


<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Statistic extends Model
{
    use HasFactory;
     
    public $timestamps = false;
    protected $fillable = [
        'label',
        'type',
        'abreviation'
    ];
    
    public function skill()
    {
        return $this->belongsToMany(Skill::class);
    }
    
    public function tree()
    {
        return $this->belongsToMany(Tree::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;
     
    public $timestamps = false;
    protected $fillable = [
        'name',
        'description',
        'healing'
    ];
    
    public function tree()
    {
        return $this->belongsToMany(Tree::class);
    }
    
    public function skill()
    {
        return $this->belongsToMany(Skill::class);
    }
}

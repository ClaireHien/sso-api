<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonnalSkill extends Model
{
    use HasFactory;
    
    public $timestamps = false;
    protected $fillable = [
        'name', 
        'description',
        'type_skill_id'
    ];
}

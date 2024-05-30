<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeMaterial extends Model
{
    use HasFactory;
    
    public $timestamps = false;
    protected $fillable = [
        'label'
    ];
}

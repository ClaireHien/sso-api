<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    
    public $timestamps = false;
    protected $fillable = [
        'name', 
        'quantity',
        'description'
    ];
    public function character(){
        return $this->belongsTo(Character::class);
    }
}

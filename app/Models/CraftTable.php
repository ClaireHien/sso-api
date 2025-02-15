<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CraftTable extends Model
{
    use HasFactory; 

    public $timestamps = false;
    protected $fillable = [
        'poor', 
        'fair',
        'good',
        'super',
        'excellent'
    ];
    
    public function craft(){
        return $this->belongsTo(Craft::class);
    }
    
    public function material(){
        return $this->belongsTo(Material::class);
    }
}
 
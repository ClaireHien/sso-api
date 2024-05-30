<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    use HasFactory;
     
    public $timestamps = false;
    protected $fillable = [
        'name', 
        'basic', 
        'description', 
        'display', 
        'price'
    ];
    
    public function typeMaterial(){
        return $this->belongsTo(TypeMaterial::class);
    }
    
    public function materialTables(){
        return $this->hasOne(MaterialTable::class);
    }
}

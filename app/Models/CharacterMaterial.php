<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CharacterMaterial extends Model
{
    use HasFactory;
    protected $table = 'character_material';
    
    public $timestamps = false;
    protected $fillable = [
        'character_id', 
        'material_id',
        'quantity'
    ];

    
    public function character(){
        return $this->belongsTo(Character::class);
    }
    
    public function material(){
        return $this->belongsTo(Material::class);
    }
    

}

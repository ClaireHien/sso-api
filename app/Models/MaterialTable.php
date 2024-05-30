<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaterialTable extends Model
{
    use HasFactory;

    
    public $timestamps = false;
    protected $fillable = [
        'simple',
        'elegant',
        'refined',
        'material_id',
    ];
    
    public function material(){
        return $this->belongsTo(Material::class);
    }
}

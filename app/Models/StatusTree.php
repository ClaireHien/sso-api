<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusTree extends Model
{
    use HasFactory;
    
    protected $table ="stereotype_tree";
    
    public $timestamps = false;
    
    protected $fillable = ['tree_id', 'stereotype_id', 'value'];
    
    public function tree(){
        return $this->belongsTo(Tree::class);
    }
    public function stereotype(){
        return $this->belongsTo(Stereotype::class);
    }
}

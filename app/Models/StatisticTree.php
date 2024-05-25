<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatisticTree extends Model
{
    use HasFactory;
    
    protected $table ="statistic_tree";
    
    public $timestamps = false;
    
    protected $fillable = ['tree_id', 'statistic_id'];
    
    public function tree(){
        return $this->belongsTo(Tree::class);
    }
    public function statistic(){
        return $this->belongsTo(Statistic::class);
    }
}

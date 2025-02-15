<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
    use HasFactory;
    
    public $timestamps = false;
    protected $fillable = [
        'name', 
        'description',
        'image',
        'level',
        'xp',
        'pc',
        'spirit_level',
        'affinity',
        'pv',
        'pv_bonus',
        'pv_max',
        'pe',
        'pe_bonus',
        'pe_max',
        'pt',
        'pt_bonus',
        'pt_max',
        'speed',
        'speed_bonus',
        'rm',
        'rm_bonus',
        'rp',
        'rp_bonus',
        'weapon_name',
        'weapon_description',
        'armor_name',
        'armor_description',
        'clothe1_name',
        'clothe1_description',
        'ornament1_name',
        'ornament1_description',
        'clothe2_name',
        'clothe2_description',
        'ornament2_name',
        'ornament2_description',
        'jewelry1_name',
        'jewelry1_description',
        'stone1_name',
        'stone1_description',
        'jewelry2_name',
        'jewelry2_description',
        'stone2_name',
        'stone2_description',
        'user_id',
        'group_id',
        'spirit_id'
    ];
    
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function group(){
        return $this->belongsTo(Group::class);
    }
    public function spirit(){
        return $this->belongsTo(Spirit::class);
    }
    public function skills()
    {
        return $this->belongsToMany(Skill::class)->withPivot('upgrade_unlock','ultimate_upgrade_unlock');
    }
    public function fight_skills()
    {
        return $this->belongsToMany(FightSkill::class)->withPivot('upgrade_unlock');
    }
    public function items()
    {
        return $this->hasMany(Item::class);
    }
    public function materials()
    {
        return $this->belongsToMany(Material::class);
    }
    public function neutral_skills()
    {
        return $this->belongsToMany(NeutralSkill::class);
    }
    
    public function statistics()
    {
        return $this->belongsToMany(Statistic::class)->withPivot('value', 'bonus');
    }
    
    public function statuses()
    {
        return $this->belongsToMany(Status::class)->withPivot('number');
    }
    public function trees()
    {
        return $this->belongsToMany(Tree::class)->withPivot('innate', 'ultimate_unlock');
    }
    public function craftSkills()
    {
        return $this->belongsToMany(CraftSkill::class);
    }
    public function personnalSkills()
    {
        return $this->belongsToMany(PersonnalSkill::class);
    }
}

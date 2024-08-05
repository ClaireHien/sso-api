<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Character;
use App\Models\CharacterFightSkill;
use App\Models\CharacterCraftSkill;
use App\Models\CharacterNeutralSkill;
use App\Models\CharacterSkill;
use App\Models\CharacterTree;
use App\Models\CharacterMaterial;
use App\Models\CharacterStatus;
use App\Models\Item;
use App\Models\Tree;
use App\Models\CharacterStatistic;
use App\Models\Statistic;

class CharacterController extends Controller
{
    public function store(Request $request, $userId){
        $request->validate([
            'name' => 'required|string|max:255'
        ]);

        $character = new Character();
        $character->name = $request->input('name');
        $character->description = "Petit lapin des prairies ~";
        $character->image = 'https://i.imgur.com/ANHuTWP.png';
        $character->level = 0;
        $character->xp = 0;
        $character->pc = 0;
        $character->spirit_level = 1;
        $character->affinity = 0;
        $character->pv = 10;
        $character->pv_bonus = 0;
        $character->pv_max = 10;
        $character->pe = 1;
        $character->pe_bonus = 0;
        $character->pe_max = 1;
        $character->pt = 1;
        $character->pt_bonus = 0;
        $character->pt_max = 1;
        $character->speed = 3;
        $character->speed_bonus = 0;
        $character->rp = 0;
        $character->rp_bonus = 0;
        $character->rm = 0;
        $character->rm_bonus = 0;
        $character->weapon_name = '';
        $character->weapon_description = '';
        $character->armor_name = '';
        $character->armor_description = '';
        $character->clothe1_name = '';
        $character->clothe1_description = '';
        $character->ornament1_name = '';
        $character->ornament1_description = '';
        $character->clothe2_name = '';
        $character->clothe2_description = '';
        $character->ornament2_name = '';
        $character->ornament2_description = '';
        $character->jewelry1_name = '';
        $character->jewelry1_description = '';
        $character->stone1_name = '';
        $character->stone1_description = '';
        $character->jewelry2_name = '';
        $character->jewelry2_description = '';
        $character->stone2_name = '';
        $character->stone2_description = '';
        $character->money = 100;
        $character->star = 1;
        $character->free_stat = 50;
        $character->user_id = $userId;
        $character->group_id = $request->input('group_id');
        $character->spirit_id = $request->input('spirit_id');

        $character->save();
        $characterId = $character->id;
        $characterName = $character->name;

        for ($n = 1; $n <= 8; $n++) {
            $character->statistics()->attach($n, ['value' => 10, 'bonus' => 0]);
        }

        $character->trees()->attach($request->input('magic_id'), ['innate' => 1, 'ultimate_unlock' => 0]);
        $character->trees()->attach($request->input('weapon_id'), ['innate' => 1, 'ultimate_unlock' => 0]);

        
        $treeMagic = Tree::find($request->input('magic_id'));
        if (!$treeMagic) {return response()->json(['message' => 'Arbre non trouvé'], 404);}
        $statistics = $treeMagic->statistics;

        foreach ($statistics as $statistic) {
            $characterStatistic = CharacterStatistic::where('character_id', $characterId)
                ->where('statistic_id', $statistic->id)
                ->first();

            if ($characterStatistic) {
                if ($request->input('magic_id') == 42){
                    $characterStatistic->value += 5;
                } else {
                    $characterStatistic->value += 10;
                }
                $characterStatistic->save();
            }
        };


        $treeWeapon = Tree::find($request->input('weapon_id'));
        if (!$treeWeapon) {return response()->json(['message' => 'Arbre non trouvé'], 404);}
        $statistics = $treeWeapon->statistics;

        foreach ($statistics as $statistic) {
            $characterStatistic = CharacterStatistic::where('character_id', $characterId)
                ->where('statistic_id', $statistic->id)
                ->first();

            if ($characterStatistic) {
                if ($request->input('weapon_id') == 26){
                    $characterStatistic->value += 5;
                } else {
                    $characterStatistic->value += 10;
                }
                $characterStatistic->save();
            }
        };

        return response()->json(['message' => 'Personnage crée avec succès', 'characterName' => $characterName, 'characterId' => $characterId]);
    
    }
    
    public function show($id){
        return Character::with('user','group.world','spirit','skills', 'fight_skills','items','materials.craftTables.craft','materials.typeMaterial','materials.materialTable','neutral_skills','statistics','statuses','trees.range','trees.typeDamage', 'trees.skills.TypeSkill','trees.typeTree','trees.skills.statistics','trees.statistics','trees.skills.statuses','trees.statuses', 'craftSkills.craft','personnalSkills')->find($id);
    }

    
    public function destroy($id){
        
        $character = Character::find($id);
        if (!$character) {return response()->json(['message' => 'Non trouvé'], 404);}

        $character->delete();

        return response()->json(['message' => 'supprimé']);
    }



    public function global(Request $request, $id){
        
        $character = Character::find($id);
        if (!$character) {return response()->json(['message' => 'Non trouvé'], 404);}


        $character->name = $request->input('name');
        $character->image = $request->input('image');
        $character->description = $request->input('description');

        $character->update();
        return response()->json(['message' => 'Mis à jour']);
    }
/*
    public function spirit(Request $request, $id){
        
        $character = Character::find($id);
        if (!$character) {return response()->json(['message' => 'Non trouvé'], 404);}


        $character->affinity = $request->input('affinity');
        $character->spirit_level = $request->input('spirit_level');

        $character->update();
        return response()->json(['message' => 'Mis à jour']);
    }
    */
    public function updateAff($id, $aff){
        
        $character = Character::find($id);
        if (!$character) {return response()->json(['message' => 'Non trouvé'], 404);}

        $character->affinity = $aff;
        $character->update();
        return response()->json(['message' => 'Mis à jour']);
    }

    public function addXP(Request $request, $id){
        
        $character = Character::find($id);
        if (!$character) {return response()->json(['message' => 'Non trouvé'], 404);}


        $newXP = $character->xp + $request->input('xp');

        $additionalLevels = 0;
        $remainingXP = $newXP;
        if($newXP > 0){
            $additionalLevels = intdiv($newXP, 10);
            $remainingXP = $newXP % 10;
        };

        $character->level += $additionalLevels;
        $character->pc += $additionalLevels;
        $character->xp = $remainingXP;

        $character->update();

        return response()->json(['message' => $character->xp, "xp"=> $request->input('xp')]);
    }

    public function dead($id){
        
        $character = Character::find($id);

        if (!$character) {return response()->json(['message' => 'Non trouvé'], 404);}


        $character->xp -= 5;
        $character->update();

        return response()->json(['message' => 'Mis à jour']);
    }
    
    public function pv(Request $request, $id, $action){
        
        $character = Character::find($id);
        if (!$character) {return response()->json(['message' => 'Non trouvé'], 404);}

        $pvMax = $character->pv_max + $character->pv_bonus;
        $newPv = $character->pv;

        if ($action == 'physicalDmg'){
            $dmg = $request->input('damageValue') - ($character->rp+$character->rp_bonus);
            if ($dmg>0){$newPv = $character->pv - $dmg;}
        } else if ($action == 'magicDmg'){
            $dmg = $request->input('damageValue') - ($character->rm+$character->rm_bonus);
            if ($dmg>0){$newPv = $character->pv - $dmg;}
        } else if ($action == 'fullDmg'){
            $newPv = $character->pv -  $request->input('damageValue');
        } else if ($action == 'heal'){
            $newPv = $character->pv + $request->input('healValue');
            if ($newPv > $pvMax){$newPv = $pvMax;}
        } else if ($action == 'healArmor'){
            $newPv = $character->pv + $request->input('healValue');
        } else if ($action == 'fullHeal'){
            $newPv = $pvMax;
        }

        if ($newPv < 0){$newPv = 0;}

        $character->pv = $newPv;

        $character->update();

        return response()->json(['message' => 'mis à jour', "pv"=> $newPv, "action" => $action]);
    }

    public function pvStatus($id, $pv){
        
        $character = Character::find($id);
        if (!$character) {return response()->json(['message' => 'Non trouvé'], 404);}

        $character->pv = $pv;
        $character->update();

        return response()->json(['message' => 'mis à jour']);
    }

    public function mainStat(Request $request, $id){
        
        $character = Character::find($id);
        if (!$character) {return response()->json(['message' => 'Non trouvé'], 404);}

        $character->pv_max = $request->input('pv_max');
        $character->pt_max = $request->input('pt_max');
        $character->pe_max = $request->input('pe_max');
        $character->rm = $request->input('rm');
        $character->rp = $request->input('rp');
        $character->speed = $request->input('speed');

        $character->pv_bonus = $request->input('pv_bonus');
        $character->pt_bonus = $request->input('pt_bonus');
        $character->pe_bonus = $request->input('pe_bonus');
        $character->rm_bonus = $request->input('rm_bonus');
        $character->rp_bonus = $request->input('rp_bonus');
        $character->speed_bonus = $request->input('speed_bonus');

        $character->update();

        return response()->json(['message' => 'mis à jour']);
    }
    
    public function star($id,$star){
        
        $character = Character::find($id);
        if (!$character) {return response()->json(['message' => 'Non trouvé'], 404);}

        $character->star = $star;
        $character->update();

        return response()->json(['message' => 'mis à jour']);
    }

    public function money($id,$money){
        $character = Character::find($id);
        if (!$character) {return response()->json(['message' => 'Non trouvé'], 404);}

        $character->money = $money;
        $character->update();

        return response()->json(['message' => 'mis à jour']);
    }

    public function upgradeFight($id,$idSkill){
        $characterFightSkill = CharacterFightSkill::where('character_id', $id)
            ->where('fight_skill_id', $idSkill)
            ->first();

        if (!$characterFightSkill) {return response()->json(['message' => 'Non trouvé'], 404);}

        $characterFightSkill->upgrade_unlock = 1;
        $characterFightSkill->update();
        
        $this->pcCost(2,$id);

        return response()->json(['message' => 'mis à jour']);

    }

    public function updateSkill($id,$type,$idSkill){

        if($type=='new'){
            $pcCost = 1;
            $characterSkill = CharacterSkill::create([
                'character_id' => $id,
                'skill_id' => $idSkill,
                'upgrade_unlock' => 0,
                'ultimate_upgrade_unlock' => 0
            ]);
            $this->pcCost(1,$id);

        } else if($type=='upgrade'){
            $characterSkill = CharacterSkill::where('character_id', $id)
            ->where('skill_id', $idSkill)
            ->first();
            if (!$characterSkill) {return response()->json(['message' => 'Non trouvé'], 404);}
            
            $characterSkill->upgrade_unlock = 1;
            $characterSkill->update();
            $this->pcCost(2,$id);

        } else if($type=='ultimate_upgrade'){
            $characterSkill = CharacterSkill::where('character_id', $id)
            ->where('skill_id', $idSkill)
            ->first();
            if (!$characterSkill) {return response()->json(['message' => 'Non trouvé'], 404);}
            
            $characterSkill->ultimate_upgrade_unlock = 1;
            $characterSkill->update();
            $this->pcCost(3,$id);
            
        } else if($type=='ultimate'){
            $characterTree = CharacterTree::where('character_id', $id)
            ->where('tree_id', $idSkill)
            ->first();
            if (!$characterTree) {return response()->json(['message' => 'Non trouvé'], 404);}
            
            $characterTree->ultimate_unlock = 1;
            $characterTree->update();
            $this->pcCost(5,$id);
        }

        return response()->json(['message' => 'mis à jour']);

    }
    
    public function inventoryQte($id,$type,$idItem,$addSub){

        if($type=='material'){
            
            if ($addSub == 'add' || $addSub == 'create'){
                
                $characterMaterial = new CharacterMaterial();
                $characterMaterial->character_id = $id;
                $characterMaterial->material_id = $idItem;
                
                $characterMaterial->save();

            }  else {
                $characterMaterial = CharacterMaterial::where('character_id', $id)
                ->where('material_id', $idItem)
                ->first();
                if (!$characterMaterial) {return response()->json(['message' => 'Non trouvé'], 404);}
                $characterMaterial->delete();
            }
            
        } else if($type=='item'){
            
            $item = Item::find($idItem);
            if (!$item) {return response()->json(['message' => 'Non trouvé'], 404);}

            if ($addSub == 'add'){
                $item->quantity+=1;
                $item->update();
            } else {
                if($item->quantity > 1) {
                    $item->quantity-=1;
                    $item->update();
                } else{
                    $item->delete();
                }
            };
            
        }

        return response()->json(['message' => 'mis à jour']);

    }

    public function addItem(Request $request, $id){
        
        $item = new Item();
        $item->name = $request->input('name');
        $item->description = $request->input('description');
        $item->character_id = $id;
        $item->quantity = 1;
        
        $item->save();
    }


    private function pcCost($cost,$id){
        
        $character = Character::find($id);
        if (!$character) {return response()->json(['message' => 'Non trouvé'], 404);}

        $character->pc -= $cost;
        $character->update();

        return response()->json(['message' => 'mis à jour']);
    }

    public function stuff(Request $request,$id){
        
        $character = Character::find($id);
        if (!$character) {return response()->json(['message' => 'Non trouvé'], 404);}

        if($request->input('weapon_name')!== null) {$character->weapon_name = $request->input('weapon_name');};
         if($request->input('weapon_description')!== null) {$character->weapon_description = $request->input('weapon_description');};

         if($request->input('armor_name')!== null) {$character->armor_name = $request->input('armor_name');};
         if($request->input('armor_description')!== null) {$character->armor_description = $request->input('armor_description');};

         if($request->input('clothe1_name')!== null) {$character->clothe1_name = $request->input('clothe1_name');};
         if($request->input('clothe1_description')!== null) {$character->clothe1_description = $request->input('clothe1_description');};

         if($request->input('clothe2_name')!== null) {$character->clothe2_name = $request->input('clothe2_name');};
         if($request->input('clothe2_description')!== null) {$character->clothe2_description = $request->input('clothe2_description');};

         if($request->input('ornament1_name')!== null) {$character->ornament1_name = $request->input('ornament1_name');};
         if($request->input('ornament1_description')!== null) {$character->ornament1_description = $request->input('ornament1_description');};

         if($request->input('ornament2_name')!== null) {$character->ornament2_name = $request->input('ornament2_name');};
         if($request->input('ornament2_description')!== null) {$character->ornament2_description = $request->input('ornament2_description');};

         if($request->input('jewelry1_name')!== null) {$character->jewelry1_name = $request->input('jewelry1_name');};
         if($request->input('jewelry1_description')!== null) {$character->jewelry1_description = $request->input('jewelry1_description');};

         if($request->input('jewelry2_name')!== null) {$character->jewelry2_name = $request->input('jewelry2_name');};
         if($request->input('jewelry2_description')!== null) {$character->jewelry2_description = $request->input('jewelry2_description');};

         if($request->input('stone1_name')!== null) {$character->stone1_name = $request->input('stone1_name');};
         if($request->input('stone1_description')!== null) {$character->stone1_description = $request->input('stone1_description');};

         if($request->input('stone2_name')!== null) {$character->stone2_name = $request->input('stone2_name');};
         if($request->input('stone2_description')!== null) {$character->stone2_description = $request->input('stone2_description');};

        $character->update();

        return response()->json(['message' => 'mis à jour']);
    }

    
    public function status($id,$type,$idStatus){

        if($type=='add'){
            
            $characterStatus = CharacterStatus::where('character_id', $id)
            ->where('status_id', $idStatus)
            ->first();
            if (!$characterStatus) {return response()->json(['message' => 'Non trouvé'], 404);}
            $characterStatus->number += 1;

            if($idStatus == 4 && $characterStatus->number == 3){
                $character = Character::find($id);
                if (!$character) {return response()->json(['message' => 'Non trouvé'], 404);}
                $character->pv -= 10;
                $character->update();
                $characterStatus->delete();
            } else if ($idStatus != 2 || $characterStatus->number < 7) {
                $characterStatus->update();
            }
            
        } else if($type=='minus'){
            $characterStatus = CharacterStatus::where('character_id', $id)
            ->where('status_id', $idStatus)
            ->first();
            if (!$characterStatus) {return response()->json(['message' => 'Non trouvé'], 404);}

            $characterStatus->number -= 1;

            if ($characterStatus->number > 0){
                $characterStatus->update();
            } else {
                $characterStatus->delete();
            }
            
        } else if ($type=='new'){
            $characterStatus = new CharacterStatus();
            $characterStatus->character_id = $id;
            $characterStatus->status_id = $idStatus;
            $characterStatus->number=1;
            $characterStatus->save();
        };

        return response()->json(['message' => 'mis à jour']);

    }

    
    public function statistic(Request $request,$id, $type, $pc, $free){

        $character = Character::find($id);
        if (!$character) {return response()->json(['message' => 'Non trouvé'], 404);}

        if ($type=="physical"){
            
            $statistic0 = Statistic::where('abreviation', 'FOR')->first();
            if (!$statistic0) {return response()->json(['message' => 'Statistique non trouvée'], 404);}

            $character->statistics()->updateExistingPivot($statistic0->id, [
                'value' => $request->input('stat0'),
                'bonus' => $request->input('stat0_bonus'),
            ]);
            
            $statistic1 = Statistic::where('abreviation', 'CON')->first();
            if (!$statistic1) {return response()->json(['message' => 'Statistique non trouvée'], 404);}

            $character->statistics()->updateExistingPivot($statistic1->id, [
                'value' => $request->input('stat1'),
                'bonus' => $request->input('stat1_bonus'),
            ]);
            
            $statistic2 = Statistic::where('abreviation', 'DEX')->first();
            if (!$statistic2) {return response()->json(['message' => 'Statistique non trouvée'], 404);}

            $character->statistics()->updateExistingPivot($statistic2->id, [
                'value' => $request->input('stat2'),
                'bonus' => $request->input('stat2_bonus'),
            ]);
            
            $statistic3 = Statistic::where('abreviation', 'PER')->first();
            if (!$statistic3) {return response()->json(['message' => 'Statistique non trouvée'], 404);}

            $character->statistics()->updateExistingPivot($statistic3->id, [
                'value' => $request->input('stat3'),
                'bonus' => $request->input('stat3_bonus'),
            ]);
        } else if ($type=="magic") {
            
            $statistic0b = Statistic::where('abreviation', 'INT')->first();
            if (!$statistic0b) {return response()->json(['message' => 'Statistique non trouvée'], 404);}

            $character->statistics()->updateExistingPivot($statistic0b->id, [
                'value' => $request->input('stat0'),
                'bonus' => $request->input('stat0_bonus'),
            ]);
            
            $statistic1b = Statistic::where('abreviation', 'CHA')->first();
            if (!$statistic1b) {return response()->json(['message' => 'Statistique non trouvée'], 404);}

            $character->statistics()->updateExistingPivot($statistic1b->id, [
                'value' => $request->input('stat1'),
                'bonus' => $request->input('stat1_bonus'),
            ]);
            
            $statistic2b = Statistic::where('abreviation', 'VIV')->first();
            if (!$statistic2b) {return response()->json(['message' => 'Statistique non trouvée'], 404);}

            $character->statistics()->updateExistingPivot($statistic2b->id, [
                'value' => $request->input('stat2'),
                'bonus' => $request->input('stat2_bonus'),
            ]);
            
            $statistic3b = Statistic::where('abreviation', 'SENSI')->first();
            if (!$statistic3b) {return response()->json(['message' => 'Statistique non trouvée'], 404);}

            $character->statistics()->updateExistingPivot($statistic3b->id, [
                'value' => $request->input('stat3'),
                'bonus' => $request->input('stat3_bonus'),
            ]);


        }


        $character->pc=$pc;
        $character->free_stat=$free;
        $character->update();

        return response()->json(['message' => 'mis à jour']);
    }

    

    public function addTree($id,$treeId){

        $characterStatus = new CharacterTree();
        $characterStatus->character_id = $id;
        $characterStatus->tree_id = $treeId;
        $characterStatus->innate=0;
        $characterStatus->ultimate_unlock=0;
        $characterStatus->save();
    
        $this->pcCost(1,$id);

        return response()->json(['message' => 'mis à jour']);

    }

    public function addNeutralSkill($id,$type, $idSkill){

        if($type=='neutral'){
            $newSkill = new CharacterNeutralSkill();
            $newSkill->character_id = $id;
            $newSkill->neutral_skill_id = $idSkill;
            $newSkill->save();
        } else if($type=='craft'){
            $newSkill = new CharacterCraftSkill();
            $newSkill->character_id = $id;
            $newSkill->craft_skill_id = $idSkill;
            $newSkill->save();
        } else if($type=='fight'){
            $newSkill = new CharacterFightSkill();
            $newSkill->character_id = $id;
            $newSkill->fight_skill_id = $idSkill;
            $newSkill->upgrade_unlock = 0;
            $newSkill->save();
        }

    
        $this->pcCost(1,$id);

        return response()->json(['message' => 'mis à jour','type'=>$type, 'id'=>$idSkill]);

    }


}

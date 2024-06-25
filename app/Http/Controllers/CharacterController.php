<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Character;

class CharacterController extends Controller
{
    public function store(Request $request, $userId)
    {
        $request->validate([
            'name' => 'required|string|max:255'
        ]);

        $character = new Character();
        $character->name = $request->input('name');
        $character->description = '';
        $character->image = '';
        $character->level = 0;
        $character->xp = 0;
        $character->pc = 0;
        $character->spirit_level = 1;
        $character->affinity = 0;
        $character->pv = 10;
        $character->pv_bonus = 0;
        $character->pv_max = 10;
        $character->pe = 2;
        $character->pe_bonus = 0;
        $character->pe_max = 2;
        $character->pt = 2;
        $character->pt_bonus = 0;
        $character->pt_max = 2;
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


        return response()->json(['message' => 'Personnage crée avec succès', 'characterName' => $characterName, 'characterId' => $characterId]);
    
    }
    
    public function show($id)
    {
        return Character::with('user','group.world','spirit','skills', 'fight_skills','items','materials','neutral_skills','statistics','statuses','trees')->find($id);
    }

    public function global(Request $request, $id)
    {
        
        $character = Character::find($id);

        if (!$character) {
            return response()->json(['message' => 'Non trouvé'], 404);
        }

        $character->name = $request->input('name');
        $character->image = $request->input('image');
        $character->description = $request->input('description');

        $character->update();
        return response()->json(['message' => 'Mis à jour']);
    }
    public function spirit(Request $request, $id)
    {
        
        $character = Character::find($id);

        if (!$character) {
            return response()->json(['message' => 'Non trouvé'], 404);
        }

        $character->affinity = $request->input('affinity');
        $character->spirit_level = $request->input('spirit_level');

        $character->update();
        return response()->json(['message' => 'Mis à jour']);
    }
    public function addXP(Request $request, $id)
    {
        
        $character = Character::find($id);

        if (!$character) {
            return response()->json(['message' => 'Non trouvé'], 404);
        }

        
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
    public function dead($id)
    {
        
        $character = Character::find($id);

        if (!$character) {
            return response()->json(['message' => 'Non trouvé'], 404);
        }

        $character->xp -= 5;
        $character->update();

        return response()->json(['message' => 'Mis à jour']);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\User;

class UserController extends Controller
{
    
    public function connexion(){
        return response()->Json(['message' => 'Page de connexion']);
    }

    
    public function login(Request $request)
    {
        // Validez les données du formulaire
        $request->validate([
            'name' => 'required',
            'password' => 'required',
        ]);

        // Tentez de connecter l'utilisateur
        if (Auth::attempt(['name' => $request->name, 'password' => $request->password])) {
            // Connexion réussie
            $user = $request->user();
                    
            $token = $request->user()->createToken($request->name);
            return response()->json(['message' => 'Connexion réussie','token' => $token->plainTextToken,'userId' => $user->id, 'userName' => $user->name]);
        } else {
            // Échec de la connexion
            return response()->json(['message' => 'Identifiants invalides'], 401);
        }
    }
    
    public function store(Request $request)
    {
        // Validez les données du formulaire si nécessaire
        $request->validate([
            'name' => 'required|string|max:255',
            'password' => 'required|string'
        ]);

        $user = new User();
        $user->name = $request->input('name');
        $user->password = bcrypt($request->input('password'));

        // Enregistrez le personnage dans la base de données
        $user->save();
        $userId = $user->id;
        return response()->json(['message' => 'Compte crée avec succès', 'userId' => $userId]);
    }

    public function show(string $id)
    {
        return User::with('characters')->find($id);

    }

    public function update(Request $request, User $userId)
    {
        // Vérifiez si le personnage existe
        if (!$userId) {
            return response()->json(['message' => 'Joueur non trouvé.'], 404);
        }

        // Mettez à jour les champs du personnage
        $userId->update([
            'name' => $request->input('name'),
            'password' => $request->input('password')
        ]);

        // Renvoyez une réponse ou effectuez d'autres actions nécessaires
        return response()->json(['message' => 'Compte mis à jour avec succès.']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

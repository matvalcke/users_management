<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
class ApiController extends Controller
{
    public function user(Request $request)
    {
        return User::all();
    }

    public function createUser(Request $request)
    {
        $validatedData = $request->validate([
            'idRole' => 'required',
            'lastname' => 'required|max:255',
            'firstname' => 'required|max:255',
            'phone' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6',
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);

        $user = User::create($validatedData);

        // Générer un token JWT pour le nouvel utilisateur
        $token = JWTAuth::fromUser($user);

        return response()->json(['user' => $user, 'token' => $token], 201);
    }

    public function getUserById($idUtilisateur)
    {
        $user = User::where('idUtilisateur', $idUtilisateur)->first();

        if ($user) {
            return response()->json($user);
        } else {
            return response()->json(['message' => 'Utilisateur non trouvé.'], 404);
        }
    }

    public function updateUserById(Request $request, $idUtilisateur)
    {
        $user = User::where('idUtilisateur', $idUtilisateur)->first();

        if ($user) {
            $validatedData = $request->validate([
                'idRole' => 'required',
                'lastname' => 'required|max:255',
                'firstname' => 'required|max:255',
                'phone' => 'required|max:255',
                'email' => 'required|email|max:255|unique:users,email,' . $user->idUtilisateur . ',idUtilisateur',
                'password' => 'required|min:6',
            ]);

            if ($request->has('password')) {
                $validatedData['password'] = Hash::make($validatedData['password']);
            }

            $user->update($validatedData);

            return response()->json(['message' => 'Utilisateur mis à jour avec succès.', 'user' => $user]);
        } else {
            return response()->json(['message' => 'Utilisateur non trouvé.'], 404);
        }
    }
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        try {
            if (!$token = JWTAuth::attempt($credentials)) {
                return response()->json(['message' => 'Échec de l\'authentification. Vérifiez vos identifiants.'], 401);
            }
        } catch (JWTException $e) {
            return response()->json(['message' => 'Erreur lors de la création du jeton.'], 500);
        }

        return response()->json(['token' => $token]);
    }

    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Déconnexion réussie']);
    }

    public function deleteUserById($idUtilisateur)
    {
        $user = User::where('idUtilisateur', $idUtilisateur)->first();

        if ($user) {
            $user->delete();

            return response()->json(['message' => 'Utilisateur supprimé avec succès.']);
        } else {
            return response()->json(['message' => 'Utilisateur non trouvé.'], 404);
        }
    }
}

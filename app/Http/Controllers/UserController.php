<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
     // Afficher la liste des utilisateurs
     public function index()
     {
         $users = User::simplePaginate(5);
         return view('users.index', compact('users'));
     }
 
     // Afficher le formulaire de création
     public function create()
     {
         return view('users.create');
     }
 
     // Enregistrer un nouvel utilisateur
     public function store(Request $request)
     {
         $validated = $request->validate([
             'name' => 'required|string|max:255',
             'email' => 'required|email|unique:users',
             'role_id' => 'required',                  ]);
 
         User::create([
             'name' => $validated['name'],
             'email' => $validated['email'],
             'role_id' => $validated['role_id'],
             'password' => '12345678',
   
         ]);
 
         return redirect()->route('users.index')->with('success', 'Utilisateur créé avec succès !');
     }
 
     // Afficher un utilisateur spécifique
     public function show(User $user)
     {
         return view('users.show', compact('user'));
     }
 
     // Afficher le formulaire d'édition
     public function edit(User $user)
     {
         return view('users.edit', compact('user'));
     }
 
     // Mettre à jour un utilisateur existant
     public function update(Request $request, User $user)
     {
         $validated = $request->validate([
             'name' => 'required|string|max:255',
             'email' => 'required|email|unique:users,email,' . $user->id,
             'role_id' => 'required'
         ]);
 
         $user->update($validated);
 
         return redirect()->route('users.index')->with('success', 'Utilisateur mis à jour avec succès !');
     }
 
     // Supprimer un utilisateur
     public function destroy(User $user)
     {
         $user->delete();
 
         return redirect()->route('users.index')->with('success', 'Utilisateur supprimé avec succès !');
     }
 
}

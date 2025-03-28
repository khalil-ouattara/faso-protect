<?php

namespace App\Livewire\Form;

use Livewire\Component;
use App\Models\User; // Assurez-vous d'importer le modèle User
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash; // Pour hasher le mot de passe

class AddUser extends Component
{
    public $name;
    public $email;
    public $password;
    public $role; // Champ pour le rôle (si vous en avez)

    public function submitForm()
    {
        $validator = Validator::make([
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password,
            'role' => $this->role, // Validation du rôle
        ], [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users', // Unique:users pour l'email unique
            'password' => 'required|string|min:8',
            'role' => 'required|string', // Validation du rôle
        ], [
            'name.required' => 'Le nom est obligatoire.',
            'email.required' => 'L\'email est obligatoire.',
            'email.email' => 'L\'email doit être une adresse email valide.',
            'email.unique' => 'Cet email est déjà utilisé.',
            'password.required' => 'Le mot de passe est obligatoire.',
            'password.min' => 'Le mot de passe doit contenir au moins 8 caractères.',
            'role.required' => 'Le rôle est obligatoire.',
        ]);

        if ($validator->fails()) {
            $this->addError('name', $validator->errors()->get('name'));
            $this->addError('email', $validator->errors()->get('email'));
            $this->addError('password', $validator->errors()->get('password'));
            $this->addError('role', $validator->errors()->get('role'));
            return;
        }

        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password), // Hashage du mot de passe
            'role' => $this->role, // Enregistrement du rôle
        ]);

        $this->resetForm(); // Réinitialisation du formulaire
        session()->flash('success', 'Utilisateur ajouté avec succès !');
    }

    public function resetForm()
    {
        $this->name = '';
        $this->email = '';
        $this->password = '';
        $this->role = '';
        $this->resetErrorBag(); // Réinitialisation des erreurs
    }

    public function render()
    {
        return view('livewire.form.user-form');
    }
}

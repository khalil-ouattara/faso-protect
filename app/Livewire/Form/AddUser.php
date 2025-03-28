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
    public $title; // Champ pour le rôle (si vous en avez)
    public $status; // Champ pour le rôle (si vous en avez)

    public static function rules()  {
        return [
        'name' => 'required|string|min:6',
        'email' => 'required|email|unique:users',
        'password' => 'required|string|min:8',
        'title' => 'required|string',
        'status' => 'required|string',
        'role' => 'required|string',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Le nom est obligatoire.',
            'name.max' => 'Le nom ne doit pas dépasser 255 caractères.',
            'email.required' => 'L\'email est obligatoire.',
            'email.email' => 'L\'email doit être une adresse email valide.',
            'email.unique' => 'Cet email est déjà utilisé.',
            'password.required' => 'Le mot de passe est obligatoire.',
            'password.min' => 'Le mot de passe doit contenir au moins 8 caractères.',
            'role.required' => 'Le rôle est obligatoire.',
            'status.required' => 'Le statut est obligatoire.',
            'title.required' => 'Le titre est obligatoire.',
        ];
    }
    public function save()
    {
        $this->validate();
        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'role' => $this->role,
            'status' => $this->status,
            'title' => $this->title,
            'password' => Hash::make($this->password), // Hashage du mot de passe
        ]);
        $this->resetForm(); // Réinitialisation du formulaire
        $this->dispatch('refreshTable');
        sweetalert()->toast()->success('Utilisateur ajouté!');
        // session()->flash('success', 'Utilisateur ajouté avec succès !');
        // $this->dispatch('showSweetAlert', ['icon' => 'success', 'title' => 'Succès', 'text' => session('success')]);
    }

    public function resetForm()
    {
        $this->name = '';
        $this->email = '';
        $this->password = '';
        $this->role = '';
        $this->title = '';
        $this->status = '';
        $this->resetErrorBag(); // Réinitialisation des erreurs
    }
    public function render()
    {
        return view('livewire.form.add-user');
    }
}

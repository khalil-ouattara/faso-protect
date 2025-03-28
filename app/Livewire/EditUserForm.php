<?php

namespace App\Livewire;

use App\Livewire\Form\AddUser;
use App\Models\User;
use App\Rules\GlobalRules;
use Livewire\Component;

class EditUserForm extends Component
{
    public $editing = false;
    public User $user;
    public $name;
    public $email;
    public $password;
    public $role; // Champ pour le rôle (si vous en avez)
    public $title; // Champ pour le rôle (si vous en avez)
    public $status;



    protected function rules()
    {
        return [
            'name'=> 'required|string|min:6',
        ];
    }


    public function mount(User $user)
    {
        $this->user = $user;
        $this->name = $this->user->name;
        $this->email = $this->user->email;
        $this->role = $this->user->role;
        $this->status = $this->user->status;
        $this->title = $this->user->title;
        $this->password = $this->user->password;
    }

    public function save(){
        // dump(AddUser::message());
        $rulesAndMessages = GlobalRules::getRules('user', $this->user->id, );
        $this->validate($rulesAndMessages['rules'], $rulesAndMessages['messages']);
        // dump($rulesAndMessages);
        $this->validate();
        $this->user->update([
            'name' => $this->name,
            'email' => $this->email,
            'role' => $this->role,
            'status' => $this->status,
            'title' => $this->title,
        ]);
        $this->dispatch('userUpdated');
    }

    public function close(){
// dump('yes');

        $this->dispatch('modalClosed');


    }
    public function render()
    { //        dump(AddUser::rules());
    //         dump(GlobalRules::getRules('user'));

        return view('livewire.edit-user-form', [
            'user'=> $this->user,
            'editing'=> $this->editing
        ]);
    }
}

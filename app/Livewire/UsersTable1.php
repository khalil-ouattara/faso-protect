<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class UsersTable1 extends Component
{
    public $users;


    public function mount()
    {
        $this->users = User::where('id', '<', '5')->get();
    }



    public function del(array $ids){
        dd($ids);
    }



    public function render()
    {
        return view('livewire.users-table');
    }
}

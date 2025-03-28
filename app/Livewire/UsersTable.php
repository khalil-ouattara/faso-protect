<?php

namespace App\Livewire;

use App\Exports\UsersExport;
use App\Models\User;
use Illuminate\Support\Arr;
use Livewire\Component;
use Livewire\Livewire;
use Livewire\WithPagination;
use Maatwebsite\Excel\Facades\Excel;


class UsersTable extends Component
{

    use WithPagination;

    public string $search = "";
    public $orderField = "name";
    public $orderDirection = "ASC";
    public int $editId = 0;
    public $editing = false;
    public int $showNumber = 10;
    // public array $selected = [];

    protected $queryString = [
        "search" => ["except" => ""],
        "orderField" => ["except" => "name"],
        "orderDirection" => ["except" => "ASC"],
    ];
    protected $listeners = [
        "modalClosed" => "onModalClosed",
        "userUpdated" => "onUserUpdated",
    ];


    public function setOrderField(string $name)
    {
        if ($name === $this->orderField) {
            $this->orderDirection = $this->orderDirection === "ASC" ? "DESC" : "ASC";
        } else {
            $this->orderField = $name;
            $this->reset('orderDirection');
            // $this->orderField = 'ASC';
        }
    }

    public function onUserUpdated()
    {
        $this->reset('editId');
        sweetalert()->toast()->success("L'utilisateur a bien été mis à jour!");
    }

    public function onModalClosed()
    {
        $this->reset('editId');
    }


    public function updating($name, $value)
    {
        if ($name === 'search') {
            $this->resetPage();
        }
    }

    public function updatedShowNumber()
    {
        $this->resetPage();
    }

    public function startEdit(int $id)
    {
        $this->editId = $id;
        $this->editing = true;
    }

    public function deleteUsers(array $ids)
    {
        User::destroy($ids);
        sweetalert()->toast()->success('Les utilisateurs ont bien été supprimés!');
    }

    public function export($format, array $ids)
    {
        if ($format == 'pdf') {
            return (new UsersExport($ids))->exportPdf();
        }
        sweetalert()->toast()->success('Les utilisateurs ont bien été exportés!');
        return Excel::download(new UsersExport($ids), 'users.' . $format);
    }

    public function render()
    {
        return view('livewire.users-table', [
            'users' => User::where('name', 'LIKE', "%{$this->search}%")
                ->orderBy($this->orderField, $this->orderDirection)
                ->paginate($this->showNumber ? $this->showNumber : 10),
            'userIds' => User::get('id')->pluck('id')->all()
        ]);
    }
}

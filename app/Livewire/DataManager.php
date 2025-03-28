<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Route;
use Livewire\WithPagination;

class DataManager extends Component
{
    use WithPagination;

    public $modelClass;
    public $model;
    public $fields;
    public $searchTerm = '';
    public $sortField = 'id';
    public $sortDirection = 'asc';
    public $selectedItems = [];
    public $newItem = [];
    public $editingItem = null;

    public function mount($modelClass)
    {
        $this->modelClass = $modelClass;
        $this->model = new $modelClass();
        $this->fields = $this->model->getFillable();
    }

    public function render()
    {
        $data = $this->modelClass::where(function ($query) {
            foreach ($this->fields as $field) {
                $query->orWhere($field, 'like', '%' . $this->searchTerm . '%');
            }
        })
            ->orderBy($this->sortField, $this->sortDirection)
            ->paginate(10);

        return view('livewire.data-manager', [
            'data' => $data,
        ]);
    }

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortField = $field;
            $this->sortDirection = 'asc';
        }
    }

    public function deleteItems()
    {
        $this->modelClass::whereIn('id', $this->selectedItems)->delete();
        $this->selectedItems = [];
        $this->render();
    }

    public function createItem($arr)
    {
        dd($this->newItem);
        $this->validate([
            'newItem.*' => 'required|string|max:255',
        ]);

        $this->modelClass::create($this->newItem);
        $this->newItem = [];
        $this->render();
    }

    public function editItem($id)
    {
        $this->editingItem = $this->modelClass::find($id);
    }

    public function updateItem()
    {
        $this->validate([
            'editingItem.*' => 'required|string|max:255',
        ]);

        $this->editingItem->save();
        $this->editingItem = null;
        $this->render();
    }

    public function cancelEdit()
    {
        $this->editingItem = null;
    }

    public function generateRoutes()
    {
        // Génère les routes dynamiquement (à adapter selon vos besoins)
        Route::get('/' . strtolower(class_basename($this->modelClass)), [
            'App\Http\Livewire\DataManager',
            '__invoke',
        ]);
        Route::get(
            '/' . strtolower(class_basename($this->modelClass)) . '/create',
            [
                'App\Http\Livewire\DataManager',
                '__invoke',
            ]
        );
        // ... autres routes
    }

    // public function render()
    // {
    //     return view('livewire.data-manager');
    // }
}

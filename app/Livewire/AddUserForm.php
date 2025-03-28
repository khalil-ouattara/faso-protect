<?php

namespace App\Livewire;


use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Livewire\Attributes\Rule;

class AddUserForm extends Component
{
    public $modelClass;
    public $fields = [];
    public $newItem = [];
    public $model;


    public function mount($modelClass)
    {
        $this->modelClass = $modelClass;
        $this->model = new $modelClass();
        $this->fields = $this->model->fields;
    }

    public function create(){
        foreach($this->model->fields as $field => $type){
        // dd($field." + type : ".$type);
    }
        $this->resetErrorBag();
        $validator = Validator::make($this->newItem, $this->model->validationRules);
        if ($validator->fails()) {
            foreach ($validator->errors()->messages() as $key => $value) {
                 $this->addError('newItem.' . $key, $value[0]);
                //  dump($value);
            }
            return;
        }
        $this->modelClass::create($this->newItem);
        $this->newItem = [];
        session()->flash('success',$this->model->createdMessage);

    }

    public function render()
    {
        return view('livewire.add-user-form');
    }
}

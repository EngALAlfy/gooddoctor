<?php

namespace App\Http\Livewire;

use App\Http\Helpers\Funcs;
use App\Models\Instructions;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CreateInstructions extends Component
{
    use Funcs;

    public $name;
    public $list;
    public $type;

    protected $rules = [
        'name' => 'required|min:3|max:200',
        'list' => 'required|min:3|max:500',
        'type' => 'required',
    ];

    public function updated($propertyName){
        $this->validateOnly($propertyName);
    }

    public function store(){

        $data = $this->validate();

        $data['user_id'] = Auth::user()->id;

        Instructions::create($data);

        // $this->emitTo(Tests::class , 'stored');
        $this->emit('stored');
        $this->name = null;
        $this->ar_name = null;
    }

    public function render()
    {
        return view('livewire.create-instructions');
    }
}

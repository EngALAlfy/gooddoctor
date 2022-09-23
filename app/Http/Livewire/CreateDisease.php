<?php

namespace App\Http\Livewire;

use App\Http\Helpers\Funcs;
use App\Models\Disease;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CreateDisease extends Component
{

    use Funcs;

    public $name;
    public $ar_name;


    protected $rules = [
        'name' => 'required|min:3|max:200',
    ];

    public function updated($propertyName){
        $this->validateOnly($propertyName);
    }


    public function store(){

        $data = $this->validate();

        $data['user_id'] = Auth::user()->id;

        Disease::create($data);

        // $this->emitTo(Tests::class , 'stored');
        $this->emit('stored');
        $this->name = null;
    }


    public function render()
    {
        return view('livewire.create-disease');
    }
}

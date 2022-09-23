<?php

namespace App\Http\Livewire;

use App\Http\Helpers\Funcs;
use App\Models\Drug;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CreateDrug extends Component
{

    use Funcs;


    public $name;
    public $ar_name;


    protected $rules = [
        'name' => 'required_if:ar_name,null|min:3|max:200|regex:/^[a-z][a-z0-9]*$/i',
        'ar_name' => 'required_if:name,null|min:3|max:200|regex:/\p{Arabic}/u',
    ];

    public function updated($propertyName){
        $this->validateOnly($propertyName);
    }


    public function store(){

        $data = $this->validate();

        $data['user_id'] = Auth::user()->id;

        Drug::create($data);

        // $this->emitTo(Tests::class , 'stored');
        $this->emit('stored');
        $this->name = null;
        $this->ar_name = null;
    }


    public function render()
    {
        return view('livewire.create-drug');
    }
}

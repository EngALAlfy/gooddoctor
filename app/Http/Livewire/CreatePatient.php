<?php

namespace App\Http\Livewire;

use App\Http\Helpers\Funcs;
use App\Models\Patient;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CreatePatient extends Component
{
    use Funcs;


    public $name;
    public $sex;
    public $age;
    public $info;
    public $phone;
    public $address;


    protected $rules = [
        'name' => 'required|min:3|max:200',
        'sex' => 'required',
        'age' => 'required',
        'phone' => 'required|digits:11',
        'address' => 'nullable|max:200',
        'info' => 'nullable|max:400',

    ];

    public function updated($propertyName){
        $this->validateOnly($propertyName);
    }


    public function store(){

        $data = $this->validate();

        $data['user_id'] = Auth::user()->id;

        Patient::create($data);

        // $this->emitTo(Tests::class , 'stored');
        $this->emit('stored');
        $this->name = null;
        $this->ar_name = null;
    }


    public function render()
    {
        return view('livewire.create-patient');
    }
}

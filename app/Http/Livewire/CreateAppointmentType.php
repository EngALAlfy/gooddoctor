<?php

namespace App\Http\Livewire;

use App\Http\Helpers\Funcs;
use App\Models\AppointmentType;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CreateAppointmentType extends Component
{

    use Funcs;


    public $name;
    public $price;
    public $info;


    protected $rules = [
        'name' => 'required|min:3|max:200',
        'price' => 'required',
        'info' => 'nullable|max:400',
    ];

    public function updated($propertyName){
        $this->validateOnly($propertyName);
    }


    public function store(){

        $data = $this->validate();

        $data['user_id'] = Auth::user()->id;

        AppointmentType::create($data);

        // $this->emitTo(Tests::class , 'stored');
        $this->emit('stored');
        $this->name = null;
        $this->ar_name = null;
    }


    public function render()
    {
        return view('livewire.create-appointment-type');
    }
}

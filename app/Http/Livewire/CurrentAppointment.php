<?php

namespace App\Http\Livewire;

use App\Http\Helpers\Funcs;
use App\Models\Appointment;
use App\Models\Disease;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CurrentAppointment extends Component
{

     use Funcs;

    public $disease_id;
    public $diagnosis;
    public $treatment_method;
    public $symptoms;
    public $info;

    protected $listeners = ['echo:current-appointment,.refresh' => 'changeCurrentAppointment' , 'disease-stored'];


    public function render()
    {
        $current_appointment = Appointment::whereDate('date', Carbon::today())->where('status', 'entered')->orderBy('order', 'desc')->first();
        $diseases = Disease::latest()->get();

        return view('livewire.current-appointment' , compact('current_appointment' , 'diseases'));
    }

    public function addDisease($current_appointment_id){
        $data = $this->validate([
            'disease_id' => 'required',
            'diagnosis' => 'nullable|max:500',
            'treatment_method' => 'nullable|max:500',
            'symptoms' => 'nullable|max:500',
            'info' => 'nullable|max:400',
        ]);


        $current_appointment = Appointment::find($current_appointment_id);

        // $data = [];
        $data['user_id'] = Auth::id();
        // $data['disease_id'] = $this->disease_id;
        // $data['diagnosis'] = $this->diagnosis;
        // $data['treatment_method'] = $this->treatment_method;
        // $data['symptoms'] = $this->symptoms;
        // $data['info'] = $this->info;

        // dd($data);

        $current_appointment->diseases()->attach($data['disease_id'] , $data);

        $this->emitSelf('disease-stored');
    }

    public function changeCurrentAppointment()
    {
        $current_appointment = Appointment::whereDate('date', Carbon::today())->where('status', 'entered')->orderBy('order', 'desc')->first();
        if($current_appointment){
            session()->flash('success', __('all.next_appointment_name' , ['name' => $current_appointment->patient->name]));
        }
    }

}

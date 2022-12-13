<?php

namespace App\Http\Livewire;

use App\Http\Helpers\Funcs;
use App\Models\Appointment;
use App\Models\AppointmentType;
use App\Models\Patient;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CreateAppointment extends Component
{
    use Funcs;

    public $patient_id;
    public $info;
    public $appointment_type_id;
    public $symptoms;
    public $date;

    public $patient_name;

    protected $listeners = ['appointment_stored' => '$refresh' , 'patient_stored' => '$refresh'];

    protected $rules = [
        'patient_id' => 'required',
        'info' => 'nullable|max:400',
        'appointment_type_id' => 'required',
        'symptoms' => 'required',
        'date' => 'nullable|date',
    ];

    protected $queryString = [
        'patient_name' => ['except' => ''],
    ];
    public function updated($propertyName){
        $this->validateOnly($propertyName);
    }

    public function store(){

        $data = $this->validate();

        // if null ---> today
        if($data['date'] == null){
            $date = Carbon::today();
        }else{
            // format datetime
            $date = new Carbon($data['date']);
        }

        $data['date'] = $date;

        $lastOrder = Appointment::whereDate('date' , $date)->orderBy('order' , 'desc')->first()->order ?? 0;

        $data['order'] = $lastOrder + 1;
        $data['user_id'] = Auth::user()->id;


        $appointment = Appointment::create($data);

        // $this->emitTo(Tests::class , 'stored');
        $this->emit('appointment_stored' , $appointment->id);
        $this->patient_id = null;
        $this->symptoms = null;
        $this->appointment_type_id = null;
        $this->patient_name = null;
        $this->info = null;
        $this->date = null;
    }

    public function render()
    {
        return view('livewire.create-appointment' , ['appointment_types' => AppointmentType::all(),'patients' => Patient::where('id' , $this->patient_name)->orWhere('name' , 'LIKE' , '%'.$this->patient_name.'%')->limit(100)->get()]);
    }
}

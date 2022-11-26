<?php

namespace App\Http\Livewire;

use App\Http\Helpers\Funcs;
use App\Models\Appointment;
use App\Models\Disease;
use App\Models\Drug;
use App\Models\Instructions;
use App\Models\PatientCard;
use App\Models\Ray;
use App\Models\Recipe;
use App\Models\Test;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CurrentAppointment extends Component
{

    use Funcs;

    public $test_id;
    public $ray_id;

    public $instructions_id;

    public $repeat_every_hours;
    public $amount;
    public $drug_id;


    public $disease_name;

    public $disease_id;
    public $diagnosis;
    public $treatment_method;
    public $symptoms;
    public $info;

    public $pulse;
    public $glucose;
    public $max_pressure;
    public $min_pressure;
    public $weight;

    public $tab = 'recipe';
    public $cardEditedField;

    public $drug_name;

    protected $listeners = ['echo:current-appointment,.refresh' => 'changeCurrentAppointment', 'modalHide', 'stored'];


    public function render()
    {
        $current_appointment = Appointment::whereDate('date', Carbon::today())->where('status', 'entered')->orderBy('order', 'desc')->first();
        $diseases = Disease::where('name', 'LIKE', "%$this->disease_name%")
                    ->withCount('appointments')
                    ->orderByDesc('appointments_count')
                    ->limit(100)->get();
        $drugs = ($this->drug_name && !$this->drug_id) ?  Drug::where('name', 'LIKE', "%$this->drug_name%")->get() : [];
        $rays = Ray::latest()->get();
        $tests = Test::latest()->get();
        $instructions = Instructions::latest()->get();
        $card = $current_appointment ? PatientCard::where('appointment_id', $current_appointment->id)->first() : null;

        // set card values
        $this->max_pressure = $card->max_pressure ?? null;
        $this->min_pressure = $card->min_pressure ?? null;
        $this->weight = $card->weight ?? null;
        $this->glucose = $card->glucose ?? null;
        $this->pulse = $card->pulse ?? null;

        return view('livewire.current-appointment', compact('current_appointment', 'instructions', 'tests', 'drugs', 'rays', 'card', 'diseases'));
    }

    public function addDisease($current_appointment_id)
    {
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

        $current_appointment->diseases()->attach($data['disease_id'], $data);

        $this->emit('modalHide');
    }

    public function updateSymptoms($current_appointment_id)
    {
        $data = $this->validate([
            'symptoms' => 'nullable|max:500',
        ]);

        $current_appointment = Appointment::find($current_appointment_id);

        $current_appointment->symptoms = $data['symptoms'];
        $current_appointment->save();

        $this->emit('modalHide');
    }

    public function addHistoryDisease($current_appointment_id)
    {
        $data = $this->validate([
            'disease_id' => 'required',
        ]);

        $current_appointment = Appointment::find($current_appointment_id);

        if ($current_appointment) {
            $patient = $current_appointment->patient;
            $patient->history()->attach($data['disease_id']);
        }

        $this->emit('modalHide');
    }

    public function addRay($current_appointment_id)
    {
        $data = $this->validate([
            'ray_id' => 'required',
        ]);

        $current_appointment = Appointment::find($current_appointment_id);

        if ($current_appointment) {
            $current_appointment->rays()->attach($data['ray_id']);
        }

        $this->emit('modalHide');
    }


    public function addInstructions($current_appointment_id)
    {
        $data = $this->validate([
            'instructions_id' => 'required',
        ]);

        $current_appointment = Appointment::find($current_appointment_id);

        if ($current_appointment) {
            $current_appointment->instructions_id = $data['instructions_id'];
            $current_appointment->save();
        }

        $this->emit('modalHide');
    }

    public function removeInstructions($current_appointment_id)
    {


        $current_appointment = Appointment::find($current_appointment_id);

        if ($current_appointment) {
            $current_appointment->instructions_id = null;
            $current_appointment->save();
        }
    }

    public function addTest($current_appointment_id)
    {
        $data = $this->validate([
            'test_id' => 'required',
        ]);

        $current_appointment = Appointment::find($current_appointment_id);

        if ($current_appointment) {
            $current_appointment->tests()->attach($data['test_id']);
        }

        $this->emit('modalHide');
    }

    public function addDrugToRecipe($current_appointment_id)
    {
        if (!$this->drug_id && $this->drug_name) {
            $drug = Drug::create(['name' => $this->drug_name, 'user_id' => Auth::id()]);
            $this->drug_id = $drug->id;
        }

        $data = $this->validate([
            'drug_id' => 'nullable',
            'repeat_every_hours' => 'nullable|numeric',
            'amount' => 'nullable',
            'info' => 'nullable|max:400',
        ]);

        $current_appointment = Appointment::find($current_appointment_id);

        if ($current_appointment) {
            $recipe = $current_appointment->recipe;
            if (!$recipe) {
                $data['appointment_id'] = $current_appointment->id;
                $data['user_id'] = Auth::id();
                $recipe = Recipe::create($data);

                unset($data['appointment_id']);
                unset($data['user_id']);
            }

            $recipe->drugs()->attach($data['drug_id'], $data);
        }

        $this->drug_id = null;
        $this->drug_name = null;
        $this->repeat_every_hours = null;
        $this->amount = null;
        $this->info = null;
    }



    public function removeHistoryDisease($current_appointment_id, $history_id)
    {

        $current_appointment = Appointment::find($current_appointment_id);

        if ($current_appointment) {
            $patient = $current_appointment->patient;
            $patient->history()->detach($history_id);
        }
    }

    public function removeDrugFromRecipe($current_appointment_id, $drug_id)
    {

        $current_appointment = Appointment::find($current_appointment_id);

        if ($current_appointment) {
            $recipe = $current_appointment->recipe;
            $recipe->drugs()->detach($drug_id);
        }
    }

    public function removeDisease($current_appointment_id, $disease_id)
    {

        $current_appointment = Appointment::find($current_appointment_id);

        if ($current_appointment) {
            $current_appointment->diseases()->detach($disease_id);
        }
    }

    public function updatePatientCard($current_appointment_id)
    {
        $rules = [
            $this->cardEditedField => 'nullable',
        ];

        if ($this->cardEditedField == 'max_pressure') {
            $rules['min_pressure'] = 'nullable';
        }

        $data = $this->validate($rules);
        $data['user_id'] = Auth::id();

        $card = PatientCard::where('appointment_id', $current_appointment_id)->first();

        if (!$card) {
            $card = new PatientCard();
            $card->appointment_id = $current_appointment_id;
            $card->save();
        }

        $card->update($data);

        $this->cardEditedField = null;
    }

    public function changeCurrentAppointment()
    {
        $current_appointment = Appointment::whereDate('date', Carbon::today())->where('status', 'entered')->orderBy('order', 'desc')->first();
        if ($current_appointment) {
            session()->flash('success', __('all.next_appointment_name', ['name' => $current_appointment->patient->name]));
        }
    }

    public function modalHide()
    {
    }
    public function stored()
    {
    }
}

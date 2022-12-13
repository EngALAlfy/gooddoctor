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

class ShowAppointment extends Component
{

    use Funcs;

    public $appointment_id;

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

    protected $listeners = ['modalHide', 'stored'];


    public function render()
    {
        $appointment = Appointment::find($this->appointment_id);
        $diseases = Disease::where('name', 'LIKE', "%$this->disease_name%")
                    ->withCount('appointments')
                    ->orderByDesc('appointments_count')
                    ->limit(100)->get();
        $drugs = ($this->drug_name && !$this->drug_id) ?  Drug::where('name', 'LIKE', "%$this->drug_name%")->get() : [];
        $rays = Ray::latest()->get();
        $tests = Test::latest()->get();
        $instructions = Instructions::latest()->get();
        $card = $appointment ? PatientCard::where('appointment_id', $appointment->id)->first() : null;

        // set card values
        $this->max_pressure = $card->max_pressure ?? null;
        $this->min_pressure = $card->min_pressure ?? null;
        $this->weight = $card->weight ?? null;
        $this->glucose = $card->glucose ?? null;
        $this->pulse = $card->pulse ?? null;

        return view('livewire.show-appointment', compact('appointment', 'instructions', 'tests', 'drugs', 'rays', 'card', 'diseases'));
    }

    public function addDisease($appointment_id)
    {
        $data = $this->validate([
            'disease_id' => 'required',
            'diagnosis' => 'nullable|max:500',
            'treatment_method' => 'nullable|max:500',
            'symptoms' => 'nullable|max:500',
            'info' => 'nullable|max:400',
        ]);


        $appointment = Appointment::find($appointment_id);

        // $data = [];
        $data['user_id'] = Auth::id();
        // $data['disease_id'] = $this->disease_id;
        // $data['diagnosis'] = $this->diagnosis;
        // $data['treatment_method'] = $this->treatment_method;
        // $data['symptoms'] = $this->symptoms;
        // $data['info'] = $this->info;

        // dd($data);

        $appointment->diseases()->attach($data['disease_id'], $data);

        $this->emit('modalHide');
    }

    public function updateSymptoms($appointment_id)
    {
        $data = $this->validate([
            'symptoms' => 'nullable|max:500',
        ]);

        $appointment = Appointment::find($appointment_id);

        $appointment->symptoms = $data['symptoms'];
        $appointment->save();

        $this->emit('modalHide');
    }

    public function addHistoryDisease($appointment_id)
    {
        $data = $this->validate([
            'disease_id' => 'required',
        ]);

        $appointment = Appointment::find($appointment_id);

        if ($appointment) {
            $patient = $appointment->patient;
            $patient->history()->attach($data['disease_id']);
        }

        $this->emit('modalHide');
    }

    public function addRay($appointment_id)
    {
        $data = $this->validate([
            'ray_id' => 'required',
        ]);

        $appointment = Appointment::find($appointment_id);

        if ($appointment) {
            $appointment->rays()->attach($data['ray_id']);
        }

        $this->emit('modalHide');
    }


    public function addInstructions($appointment_id)
    {
        $data = $this->validate([
            'instructions_id' => 'required',
        ]);

        $appointment = Appointment::find($appointment_id);

        if ($appointment) {
            $appointment->instructions_id = $data['instructions_id'];
            $appointment->save();
        }

        $this->emit('modalHide');
    }

    public function removeInstructions($appointment_id)
    {


        $appointment = Appointment::find($appointment_id);

        if ($appointment) {
            $appointment->instructions_id = null;
            $appointment->save();
        }
    }

    public function addTest($appointment_id)
    {
        $data = $this->validate([
            'test_id' => 'required',
        ]);

        $appointment = Appointment::find($appointment_id);

        if ($appointment) {
            $appointment->tests()->attach($data['test_id']);
        }

        $this->emit('modalHide');
    }

    public function addDrugToRecipe($appointment_id)
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

        $appointment = Appointment::find($appointment_id);

        if ($appointment) {
            $recipe = $appointment->recipe;
            if (!$recipe) {
                $data['appointment_id'] = $appointment->id;
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



    public function removeHistoryDisease($appointment_id, $history_id)
    {

        $appointment = Appointment::find($appointment_id);

        if ($appointment) {
            $patient = $appointment->patient;
            $patient->history()->detach($history_id);
        }
    }

    public function removeDrugFromRecipe($appointment_id, $drug_id)
    {

        $appointment = Appointment::find($appointment_id);

        if ($appointment) {
            $recipe = $appointment->recipe;
            $recipe->drugs()->detach($drug_id);
        }
    }

    public function removeDisease($appointment_id, $disease_id)
    {

        $appointment = Appointment::find($appointment_id);

        if ($appointment) {
            $appointment->diseases()->detach($disease_id);
        }
    }

    public function updatePatientCard($appointment_id)
    {
        $rules = [
            $this->cardEditedField => 'nullable',
        ];

        if ($this->cardEditedField == 'max_pressure') {
            $rules['min_pressure'] = 'nullable';
        }

        $data = $this->validate($rules);
        $data['user_id'] = Auth::id();

        $card = PatientCard::where('appointment_id', $appointment_id)->first();

        if (!$card) {
            $card = new PatientCard();
            $card->appointment_id = $appointment_id;
            $card->save();
        }

        $card->update($data);

        $this->cardEditedField = null;
    }

    public function modalHide()
    {
    }
    public function stored()
    {
    }
}

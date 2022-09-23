<?php

namespace App\View\Components;

use App\Models\Appointment;
use App\Models\Disease;
use App\Models\Drug;
use App\Models\Patient;
use App\Models\Ray;
use App\Models\Recipe;
use App\Models\Test;
use App\Models\Instructions;
use Carbon\Carbon;
use Illuminate\View\Component;

class MainSidebar extends Component
{

    public $patients_count;
    public $recipes_count;
    public $diseases_count;
    public $drugs_count;
    public $rays_count;
    public $tests_count;
    public $instructions_count;
    public $yesterday_appointments_count;
    public $all_appointments_count;
    public $today_appointments_count;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->patients_count = Patient::count();
        $this->recipes_count = Recipe::count();
        $this->diseases_count = Disease::count();
        $this->drugs_count = Drug::count();
        $this->rays_count = Ray::count();
        $this->tests_count = Test::count();
        $this->instructions_count = Instructions::count();

        $this->all_appointments_count = Appointment::count();
        $this->today_appointments_count = Appointment::whereDate('date' , Carbon::today())->count();
        $this->yesterday_appointments_count = Appointment::whereDate('date' , Carbon::yesterday())->count();

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.main-sidebar');
    }
}

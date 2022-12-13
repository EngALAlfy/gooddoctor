<?php

namespace App\Http\Livewire;

use App\Http\Helpers\Funcs;
use App\Models\Appointment;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class AllAppointments extends Component
{
    use Funcs;
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $perPage = 50;
    public $orderBy = 'order';
    public $order = 'asc';
    public $search = '';

    public $deleteId;

    // settings
    public $delete_dialog;


    protected $listeners = ['appointment_stored' , 'patient_stored' => '$refresh'];

    protected $queryString = [
        'search' => ['except' => ''],
        'perPage' => ['except' => ''],
        'order' => ['except' => ''],
        'orderBy' => ['except' => ''],
    ];



    public function appointment_stored($appointment_id = null)
    {
        $this->success();

        if($appointment_id){

        $appointment = Appointment::find($appointment_id);

        session()->flash('info', __('all.appointment_info_alert', ['order' => $appointment->order, 'date' => $appointment->date, 'name' => $appointment->patient->name]));
        //$this->render();
        }
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.all-appointments', ['appointments' => Appointment::where('id', 'LIKE', '%' . $this->search . '%')->orderBy('date', 'desc')->orderBy($this->orderBy, $this->order)->paginate($this->perPage)]);
    }

    function deleteId($id)
    {
        $this->deleteId = $id;
    }

    function delete()
    {
        $appointment = Appointment::find($this->deleteId);
        $order = $appointment->order;
        $date = $appointment->date;
        //  delete
        $appointment->delete();
        // decreese order - 1
        Appointment::whereDate('date' , $date)->where('order' , '>' , $order)->update(['order' => DB::Raw('`order` - 1')]);

        $this->success();
        $this->deleteId = null;
    }
}

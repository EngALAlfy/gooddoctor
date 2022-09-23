<?php

namespace App\Http\Livewire;

use App\Events\CurrentAppointmentEvent;
use App\Http\Helpers\Funcs;
use App\Models\Appointment;
use Carbon\Carbon;
use Illuminate\Broadcasting\BroadcastException;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class TodayAppointments extends Component
{

    use Funcs;
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $perPage = 50;
    public $orderBy = 'order';
    public $order = 'asc';
    public $search = '';

    public $deleteId;

    public $current_appointment_id;

    // settings
    public $delete_dialog;


    protected $listeners = ['stored'];

    protected $queryString = [
        'search' => ['except' => ''],
        'perPage' => ['except' => ''],
        'order' => ['except' => ''],
        'orderBy' => ['except' => ''],
    ];


    public function stored($appointment_id)
    {
        $this->success();

        $appointment = Appointment::find($appointment_id);

        session()->flash('info', __('all.appointment_info_alert', ['order' => $appointment->order, 'date' => $appointment->date, 'name' => $appointment->patient->name]));
        //$this->render();
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {

        $appointments = Appointment::whereDate('date', Carbon::today())->where('id', 'LIKE', '%' . $this->search . '%')->orderBy('date', 'desc')->orderBy($this->orderBy, $this->order)->paginate($this->perPage);
        $next_appointment = Appointment::whereDate('date', Carbon::today())->where('status', 'hold')->orderBy('order', 'asc')->first();
        $current_appointment = Appointment::whereDate('date', Carbon::today())->where('status', 'entered')->orderBy('order', 'desc')->first();
        $previous_appointment = Appointment::whereDate('date', Carbon::today())->where('status', 'exited')->orderBy('order', 'desc')->first();

        if ($current_appointment) {
            if ($current_appointment->id != $this->current_appointment_id) {
                try {
                    broadcast(new CurrentAppointmentEvent());
                } catch (BroadcastException $th) {
                    $this->error('all.socket_error');
                }
                $this->current_appointment_id = $current_appointment->id;
            }
        }else{
            if($this->current_appointment_id){
                broadcast(new CurrentAppointmentEvent());
                $this->current_appointment_id = null;
            }
        }

        return view('livewire.today-appointments', compact('appointments', 'current_appointment', 'next_appointment', 'previous_appointment'));
    }

    function nextAppointment($current_appointment_id, $next_appointment_id)
    {

        // enter the next appointment
        $this->done($next_appointment_id, true);

        // exit the current appointment
        $this->exit($current_appointment_id, true);
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
        Appointment::whereDate('date', $date)->where('order', '>', $order)->update(['order' => DB::Raw('`order` - 1')]);

        $this->success();
        $this->deleteId = null;
    }

    function updateOrder($id, $newOrder)
    {
        $appointment = Appointment::find($id);
        $order = $appointment->order;
        $date = $appointment->date;

        if ($newOrder < $order) {
            Appointment::whereDate('date', $date)->where('order', '>=', $newOrder)->where('order', '<', $order)->update(['order' => DB::Raw('`order` + 1')]);
        } else {
            Appointment::whereDate('date', $date)->where('order', '<=', $newOrder)->where('order', '>', $order)->update(['order' => DB::Raw('`order` - 1')]);
        }

        $appointment->update(['order' => $newOrder]);
        // $this->success();
    }

    function done($id, $done)
    {
        $appointment = Appointment::find($id);
        if ($appointment) {
            $appointment->status = $done ? "entered" : "hold";
            $appointment->enter_time = $done ? now() : null;
            $appointment->save();
        }
    }

    function exit($id, $done)
    {
        $appointment = Appointment::find($id);
        if ($appointment) {
            $appointment->status = $done ? "exited" : "hold";
            $appointment->exit_time = $done ? now() : null;
            $appointment->save();
        }
    }
}

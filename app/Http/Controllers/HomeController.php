<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Patient;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    function index()
    {
        $today_appointments_count = Appointment::whereDate("date", Carbon::today())->count();
        $next_appointments_count = Appointment::whereDate("date", '>', Carbon::today())->count();
        $past_appointments_count = Appointment::whereDate("date", '<', Carbon::today())->count();
        $new_patients_count = Patient::whereDate("created_at", '>=', Carbon::today())->count();

        $all_appointments = Appointment::all();
        $calender_appointments = [];

        foreach ($all_appointments->groupBy('date')->toArray() as $key => $value) {
            $color = $this->randomHexColor();
            $event = [
                "title" => __("all.appointments") . ' : ' . count($value),
                "url" => route('appointments.date', $key),
                "start" => $key,
                "backgroundColor" => $color,
                "borderColor" => $color,
                "allDay" => true
            ];

            $calender_appointments[] = $event;
        }

        return view('home.index', compact('today_appointments_count', 'next_appointments_count', 'past_appointments_count', 'new_patients_count', 'calender_appointments'));
    }

    function search(Request $request)
    {
        $query = $request->input('q');
        return view('home.search' ,compact( 'query'));
    }

    function randomHexColor()
    {
        return '#' . substr(str_shuffle('ABCDEF0123456789'), 0, 6);
    }


}

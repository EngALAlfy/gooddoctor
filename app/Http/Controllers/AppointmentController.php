<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Http\Requests\StoreAppointmentRequest;
use App\Http\Requests\UpdateAppointmentRequest;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('appointments.index');
    }
    public function today()
    {
        return view('appointments.today');
    }
    public function yesterday()
    {
        return view('appointments.yesterday');
    }
    public function next()
    {
        return view('appointments.next');
    }

    public function exited()
    {
        return view('appointments.exited');
    }

    public function current()
    {
        return view('appointments.current');
    }

    public function print(Appointment $appointment , $printable)
    {
        return view("prints.$printable" , compact('appointment' , 'printable'));
    }

    public function date($date)
    {
        return view('appointments.date' , compact('date'));
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function show(Appointment $appointment)
    {
        return view('appointments.show' , compact('appointment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function edit(Appointment $appointment)
    {
        //
    }

    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \App\Http\Requests\UpdateAppointmentRequest  $request
    //  * @param  \App\Models\Appointment  $appointment
    //  * @return \Illuminate\Http\Response
    //  */
    // public function update(UpdateAppointmentRequest $request, Appointment $appointment)
    // {
    //     //
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Appointment $appointment)
    {
        //
    }
}

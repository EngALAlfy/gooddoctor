<?php

namespace App\Http\Controllers;

use App\Models\AppointmentType;
use App\Http\Requests\StoreAppointmentTypeRequest;
use App\Http\Requests\UpdateAppointmentTypeRequest;

class AppointmentTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('appointment-types.index');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AppointmentType  $appointmentType
     * @return \Illuminate\Http\Response
     */
    public function show(AppointmentType $appointmentType)
    {
        return view('appointment-types.show' , compact('appointmentType'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AppointmentType  $appointmentType
     * @return \Illuminate\Http\Response
     */
    public function edit(AppointmentType $appointmentType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAppointmentTypeRequest  $request
     * @param  \App\Models\AppointmentType  $appointmentType
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAppointmentTypeRequest $request, AppointmentType $appointmentType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AppointmentType  $appointmentType
     * @return \Illuminate\Http\Response
     */
    public function destroy(AppointmentType $appointmentType)
    {
        //
    }
}

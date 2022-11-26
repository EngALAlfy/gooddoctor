<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Http\Requests\StorePatientRequest;
use App\Http\Requests\UpdatePatientRequest;
use App\Models\Appointment;
use App\Models\Disease;
use App\Models\Ray;
use App\Models\Test;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('patients.index');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function show(Patient $patient)
    {

        $patient->loadCount('appointments');
        $patient->loadCount('next_appointments');
        $patient->loadCount('today_appointments');
        $patient->loadCount('previous_appointments');

        $patient_appointments = Appointment::where('patient_id' , $patient->id)->get();
        // $appointments = count($patient_appointments);
        $appointments_ids = $patient_appointments->pluck('id')->toArray();
         $tests = Test::whereHas('appointments' , function($query) use ($appointments_ids){
             $query->whereIn('appointments.id' , $appointments_ids);
         })->count();
        $rays = Ray::whereHas('appointments' , function($query) use ($appointments_ids){
            $query->whereIn('appointments.id' , $appointments_ids);
        })->count();
        $diseases = Disease::whereHas('appointments' , function($query) use ($appointments_ids){
            $query->whereIn('appointments.id' , $appointments_ids);
        })->count();

        return view('patients.show' , compact('patient' , 'rays' ,'tests' ,'diseases'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function edit(Patient $patient)
    {
        return view('patients.edit' , compact('patient'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePatientRequest  $request
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePatientRequest $request, Patient $patient)
    {
        $data = $request->validated();

        $patient->update($data);

        $this->success();

        return redirect()->route('patients.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function destroy(Patient $patient)
    {
        $patient->delete();

        $this->success();
        return redirect()->route('patients.index');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\PatientCard;
use App\Http\Requests\StorePatientCardRequest;
use App\Http\Requests\UpdatePatientCardRequest;

class PatientCardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePatientCardRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePatientCardRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PatientCard  $patientCard
     * @return \Illuminate\Http\Response
     */
    public function show(PatientCard $patientCard)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PatientCard  $patientCard
     * @return \Illuminate\Http\Response
     */
    public function edit(PatientCard $patientCard)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePatientCardRequest  $request
     * @param  \App\Models\PatientCard  $patientCard
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePatientCardRequest $request, PatientCard $patientCard)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PatientCard  $patientCard
     * @return \Illuminate\Http\Response
     */
    public function destroy(PatientCard $patientCard)
    {
        //
    }
}

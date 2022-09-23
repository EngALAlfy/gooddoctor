<?php

namespace App\Http\Controllers;

use App\Models\Instructions;
use App\Http\Requests\StoreInstructionsRequest;
use App\Http\Requests\UpdateInstructionsRequest;

class InstructionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('instructions.index');
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
     * @param  \App\Http\Requests\StoreInstructionsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreInstructionsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Instructions  $instructions
     * @return \Illuminate\Http\Response
     */
    public function show(Instructions $instructions)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Instructions  $instructions
     * @return \Illuminate\Http\Response
     */
    public function edit(Instructions $instructions)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateInstructionsRequest  $request
     * @param  \App\Models\Instructions  $instructions
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateInstructionsRequest $request, Instructions $instructions)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Instructions  $instructions
     * @return \Illuminate\Http\Response
     */
    public function destroy(Instructions $instructions)
    {
        //
    }
}

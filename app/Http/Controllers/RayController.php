<?php

namespace App\Http\Controllers;

use App\Models\Ray;
use App\Http\Requests\StoreRayRequest;
use App\Http\Requests\UpdateRayRequest;

class RayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('rays.index');
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
     * @param  \App\Http\Requests\StoreRayRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRayRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ray  $ray
     * @return \Illuminate\Http\Response
     */
    public function show(Ray $ray)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ray  $ray
     * @return \Illuminate\Http\Response
     */
    public function edit(Ray $ray)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRayRequest  $request
     * @param  \App\Models\Ray  $ray
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRayRequest $request, Ray $ray)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ray  $ray
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ray $ray)
    {
        //
    }
}

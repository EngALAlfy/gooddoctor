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
     * Display the specified resource.
     *
     * @param  \App\Models\Ray  $ray
     */
    public function show(Ray $ray)
    {
        return view('rays.show' , compact('ray'));
    }




}

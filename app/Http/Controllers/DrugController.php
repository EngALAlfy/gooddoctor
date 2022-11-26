<?php

namespace App\Http\Controllers;

use App\Models\Drug;
use App\Http\Requests\StoreDrugRequest;
use App\Http\Requests\UpdateDrugRequest;

class DrugController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('drugs.index');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Drug  $drug
     * @return \Illuminate\Http\Response
     */
    public function show(Drug $drug)
    {
        return view('drugs.show' , compact('drug'));
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Drug  $drug
     * @return \Illuminate\Http\Response
     */
    public function destroy(Drug $drug)
    {
        //
    }
}

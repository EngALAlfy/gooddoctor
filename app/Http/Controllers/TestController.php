<?php

namespace App\Http\Controllers;

use App\Models\Test;
use App\Http\Requests\StoreTestRequest;
use App\Http\Requests\UpdateTestRequest;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        return view('tests.index');
    }



    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Test  $test
     */

    public function show(Test $test)
    {
        return view('tests.show' , compact('test'));
    }


}

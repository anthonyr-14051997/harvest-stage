<?php

namespace App\Http\Controllers;

use App\Models\Outflow;
use App\Http\Requests\StoreOutflowRequest;
use App\Http\Requests\UpdateOutflowRequest;

class OutflowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $outflows = Outflow::get();
        return view('stage.outflow', compact('outflows'));
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
     * @param  \App\Http\Requests\StoreOutflowRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOutflowRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Outflow  $outflow
     * @return \Illuminate\Http\Response
     */
    public function show(Outflow $outflow)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Outflow  $outflow
     * @return \Illuminate\Http\Response
     */
    public function edit(Outflow $outflow)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOutflowRequest  $request
     * @param  \App\Models\Outflow  $outflow
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOutflowRequest $request, Outflow $outflow)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Outflow  $outflow
     * @return \Illuminate\Http\Response
     */
    public function destroy(Outflow $outflow)
    {
        //
    }
}

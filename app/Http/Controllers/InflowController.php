<?php

namespace App\Http\Controllers;

use App\Models\Inflow;
use App\Http\Requests\StoreInflowRequest;
use App\Http\Requests\UpdateInflowRequest;

class InflowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('stage.inflow');
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
     * @param  \App\Http\Requests\StoreInflowRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreInflowRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Inflow  $inflow
     * @return \Illuminate\Http\Response
     */
    public function show(Inflow $inflow)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Inflow  $inflow
     * @return \Illuminate\Http\Response
     */
    public function edit(Inflow $inflow)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateInflowRequest  $request
     * @param  \App\Models\Inflow  $inflow
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateInflowRequest $request, Inflow $inflow)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Inflow  $inflow
     * @return \Illuminate\Http\Response
     */
    public function destroy(Inflow $inflow)
    {
        //
    }
}

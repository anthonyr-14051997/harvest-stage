<?php

namespace App\Http\Controllers;

use App\Models\FixedCost;
use App\Http\Requests\StorefixedCostRequest;
use App\Http\Requests\UpdatefixedCostRequest;

class FixedCostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fixedflows = FixedCost::where('user_id', auth()->user()->id)->get();

        return view('stage.fixedflow', 'fixedflows');
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
     * @param  \App\Http\Requests\StorefixedCostRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorefixedCostRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\fixedCost  $fixedCost
     * @return \Illuminate\Http\Response
     */
    public function show(fixedCost $fixedCost)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\fixedCost  $fixedCost
     * @return \Illuminate\Http\Response
     */
    public function edit(fixedCost $fixedCost)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatefixedCostRequest  $request
     * @param  \App\Models\fixedCost  $fixedCost
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatefixedCostRequest $request, fixedCost $fixedCost)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\fixedCost  $fixedCost
     * @return \Illuminate\Http\Response
     */
    public function destroy(fixedCost $fixedCost)
    {
        //
    }
}

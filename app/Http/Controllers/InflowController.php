<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Inflow;
use App\Http\Requests\StoreInflowRequest;
use App\Http\Requests\UpdateInflowRequest;
use Illuminate\Support\Str;

class InflowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inflows = Inflow::where('user_id', auth()->user()->id)->get();
        $categories = auth()->user()->categories;
        return view('stage.inflow', compact('inflows', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('stage.add_inflow');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreInflowRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreInflowRequest $request)
    {

        $collection = Str::of($request->categories)->explode(',');

        foreach ($collection as $category) {
            $check_category = Str::of($category)->trim();
            if($check_category != ""){
                Category::firstOrCreate([
                    'name' => $check_category,
                    'user_id' => auth()->user()->id,
                ]);
            }
        }
        
        Inflow::create([
            'name' => $request->title,
            'value' => $request->value,
            'date' => now(),
            'user_id' => auth()->user()->id,
        ]);

        return redirect()->route('inflows.index')->with('success', 'Votre post a été créé');
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

<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Flow;
use App\Http\Requests\StoreFlowRequest;
use App\Http\Requests\UpdateFlowRequest;
use Illuminate\Support\Str;

class FlowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $flows = Flow::where('user_id', auth()->user()->id)->get();
        $categories = auth()->user()->categories;
        return view('stage.flow', compact('flows', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('stage.add_flow');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreFlowRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFlowRequest $request)
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
        
        Flow::create([
            'name' => $request->title,
            'value' => $request->value,
            'date' => now(),
            'user_id' => auth()->user()->id,
        ]);

        return redirect()->route('flows.index')->with('success', 'Votre post a été créé');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Flow  $flow
     * @return \Illuminate\Http\Response
     */
    public function show(Flow $flow)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Flow  $flow
     * @return \Illuminate\Http\Response
     */
    public function edit(Flow $flow)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateFlowRequest  $request
     * @param  \App\Models\Flow  $flow
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFlowRequest $request, Flow $flow)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Flow  $flow
     * @return \Illuminate\Http\Response
     */
    public function destroy(Flow $flow)
    {
        //
    }
}

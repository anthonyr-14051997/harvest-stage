<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Flow;
use App\Http\Requests\StoreFlowRequest;
use App\Http\Requests\UpdateFlowRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Gate;

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

        $categories = Category::where('user_id', auth()->user()->id)->get();

        return view('stage.flow', compact('flows', 'categories'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('stage.flows');

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

        $flow = Flow::create([
            'name' => $request->title,
            'value' => $request->value,
            'date' => now(),
            'type' => $request->flow,
            'user_id' => auth()->user()->id,
            'percentage_urssaf_id' => '1'
        ]);

        foreach ($collection as $category) {
            $check_category = Str::of($category)->trim();
            if($check_category != ""){
                Category::firstOrCreate([
                    'name' => $check_category,
                    'user_id' => auth()->user()->id,
                ]);
            }

            $id = Category::where('name', $check_category)->where('user_id', auth()->user()->id)->first();
            $flow->categories()->attach($id);
        }

        $request = $flow;

        return redirect()->route('flows.index')->with('success', 'Votre post a été créé', $request);
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
        $categories = Category::where('user_id', auth()->user()->id)->get();

        return view('stage.flowEdit', compact('flow', 'categories'));
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

        $arrayUpdate = [
            'name' => $request->title,
            'value' => $request->value,
            'type' => $request->flow
        ];

        $flow->update($arrayUpdate);

        return redirect()->route('flows.index')->with('success', 'Votre post a été modifier');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Flow  $flow
     * @return \Illuminate\Http\Response
     */
    public function destroy(Flow $flow)
    {

        $flows = Flow::find($flow)->delete();

        dd($flow);

        return redirect()->route('flows.index')->with('success', 'Votre post a été supprimé');

    }
}

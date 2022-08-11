<?php

namespace App\Http\Controllers;

use App\Models\FixedCost;
use App\Models\Category;
use Illuminate\Support\Str;
use App\Http\Requests\StoreFixedCostRequest;
use App\Http\Requests\UpdateFixedCostRequest;

class FixedCostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fixflows = FixedCost::where('user_id', auth()->user()->id)->get();

        $categories = Category::where('user_id', auth()->user()->id)->get();

        return view('stage.fixedflow', compact('fixflows', 'categories'));
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
     * @param  \App\Http\Requests\StoreFixedCostRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFixedCostRequest $request)
    {
        $collection = Str::of($request->categories)->explode(',');

        $fixedflow = FixedCost::create([
            'name' => $request->title,
            'value' => $request->value,
            'période' => $request->periode,
            'user_id' => auth()->user()->id
        ]);

        foreach ($collection as $category) {
            $check_category = Str::of($category)->trim();
            if($check_category != ""){
                Category::firstOrCreate([
                    'name' => $check_category,
                    'user_id' => auth()->user()->id,
                ]);
            }
        }

        $id = Category::where('name', $check_category)->where('user_id', auth()->user()->id)->first();
        $fixedflow->categories()->attach($id);

        return redirect()->route('fixeds.index')->with('success', 'Votre post a été créé');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FixedCost  $fixedCost
     * @return \Illuminate\Http\Response
     */
    public function show(FixedCost $fixedCost)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FixedCost  $fixedCost
     * @return \Illuminate\Http\Response
     */
    public function edit(FixedCost $fixedCost)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateFixedCostRequest  $request
     * @param  \App\Models\FixedCost  $fixedCost
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFixedCostRequest $request, FixedCost $fixedCost)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FixedCost  $fixedCost
     * @return \Illuminate\Http\Response
     */
    public function destroy(FixedCost $fixedCost)
    {
        //
    }
}

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
            'type' => $request->flow,
            'user_id' => auth()->user()->id,
            'percentage_urssaf_id' => '1'
        ]);

        $id = Category::where('name', $check_category)->where('user_id', auth()->user()->id)->first();
        $flow->categories()->attach($id);

        return redirect()->route('flows.index')->with('success', 'Votre post a été créé');

        /* 
        $fixflows = FixedCost::where('user_id', auth()->user()->id)->get();

        $categories = Category::where('user_id', auth()->user()->id)->get();

        public function users()
        {
            return $this->belongsTo(User::class);
        }

        public function categories()
        {
            return $this->belongsToMany(Category::class);
        }

        return [
            'value' => $this->faker->randomFloat(2, 100, 2500),
            'name' => $this->faker->sentence(rand(5, 10), true),
            'periode' => $this->faker->numberBetween(1, 12),
            'date' => $this->faker->date(),
            'user_id' => $this->faker->numberBetween(1, 11)
        ];

        $table->foreignIdFor(FixedCost::class);
        $table->foreignIdFor(Category::class);

        FixedCost::factory(20)->create(); */

        return view('stage.fixedflow', compact('fixflows', 'categories'));
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

        dd($request);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Flow  $flow
     * @return \Illuminate\Http\Response
     */
    public function destroy(Flow $flow)
    {

        $flow->delete();

        return redirect()->route('flows.index')->with('success', 'Votre post a été supprimé');

    }
}

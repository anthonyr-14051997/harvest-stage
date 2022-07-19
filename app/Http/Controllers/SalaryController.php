<?php

namespace App\Http\Controllers;

use App\Models\Salary;
use App\Models\User;
use App\Models\Inflow;
use App\Models\Outflow;
use App\Models\Category;
use DB;
use App\Http\Requests\StoreSalaryRequest;
use App\Http\Requests\UpdateSalaryRequest;

class SalaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inflows = Inflow::sum('value');
        $outflows = Outflow::sum('value');

        $sum = $inflows - $outflows; // chiffre d'affaires annuel sans tva

        $tva = $sum * 22;
        $tva_add = $tva / 100;
        $sum_tva = $sum - $tva_add; // chiffre d'affaire annuel avec tva

        $month_tva = $sum_tva / 12; // salaire au mois en comptant la tva

        $month = $sum / 12;
        
        return view('stage.salary', compact('month_tva', 'sum_tva', 'sum', 'month'));
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
     * @param  \App\Http\Requests\StoreSalaryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSalaryRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Salary  $salary
     * @return \Illuminate\Http\Response
     */
    public function show(Salary $salary)
    {
        $inflows = Inflow::select(DB::raw("COUNT(*) as count"), "value")
                    ->orderBy('user_id','ASC')
                    ->pluck('count', 'value');
        $outflows = Outflow::select(DB::raw("COUNT(*) as count"), "value")
                    ->orderBy('user_id','ASC')
                    ->pluck('count', 'value');
        
        return view('stage.salary', compact('inflows', 'outflows'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Salary  $salary
     * @return \Illuminate\Http\Response
     */
    public function edit(Salary $salary)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSalaryRequest  $request
     * @param  \App\Models\Salary  $salary
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSalaryRequest $request, Salary $salary)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Salary  $salary
     * @return \Illuminate\Http\Response
     */
    public function destroy(Salary $salary)
    {
        //
    }
}

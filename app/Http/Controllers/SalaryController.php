<?php

namespace App\Http\Controllers;

use App\Models\Salary;
use App\Models\User;
use App\Models\Inflow;
use App\Models\Outflow;
use App\Models\Category;
use App\Models\PercentageUrssaf;
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

        // salaire 

        $inflows = Inflow::where('user_id', auth()->user()->id)->get();
        foreach ($inflows as $inflow) {
            $inflow_value = $inflow->value;
            $inflow_percent = $inflow->percentage_urssaf->percentage;
            $urssaf = $inflow_value * $inflow_percent;
            $urssaf_taxe = $urssaf / 100;
            $inflow_val_taxe = $inflow_value - $urssaf_taxe;
        }

        // salaire généraux

        $inflow_year_sum = Inflow::where('user_id', auth()->user()->id)->whereYear('date', '1974')->sum('value');

        $inflow_month = $inflow_year_sum / 12;

        /* 
        2022
        Jusqu'à 10 225 €	0 %
        De 10 226 € à 26 070 €	11 %
        De 26 071 € à 74 545 €	30 %
        De 74 546 € à 160 336 €	41 %
        Supérieur à 160 336 €	45 % 
        */

        dd(round($inflow_month, 2));
        
        $outflows = Outflow::sum('value');

        $sum = $inflows - $outflows; // chiffre d'affaires annuel sans tva

        $tva = $sum * 22;
        $tva_add = $tva / 100;
        $sum_tva = $sum - $tva_add; // chiffre d'affaire annuel avec tva

        $month = $sum / 12; // salaire au mois sans tva

        $month_tva = $sum_tva / 12; // salaire au mois avec tva

        $sum = number_format($sum, 2, '.', ' ');
        $sum_tva = number_format($sum_tva, 2, '.', ' ');
        $month_tva = number_format($month_tva, 2, '.', ' ');
        $month = number_format($month, 2, '.', ' ');
        
        return view('stage.salary', compact('month_tva', 'sum_tva', 'sum', 'month', 'inflow_percent', 'inflow_value'));
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

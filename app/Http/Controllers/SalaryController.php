<?php

namespace App\Http\Controllers;

use App\Models\Salary;
use App\Models\User;
use App\Models\Flow;
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

        $flows = Flow::where('user_id', auth()->user()->id)->where('type', 'inflow')->get();
        foreach ($flows as $flow) {
            $flow_value = $flow->value;
            $flow_percent = $flow->percentage_urssaf->percentage;
            $urssaf = $flow_value * $flow_percent;
            $urssaf_taxe = $urssaf / 100;
            $flow_val_taxe = $flow_value - $urssaf_taxe;
        }

        // salaire généraux

        /* date('Y') */
        $flow_year_outflow = Flow::where('user_id', auth()->user()->id)->whereYear('date', date('Y'))->where('type', 'outflow')->sum('value');
        $flow_year_sum = Flow::where('user_id', auth()->user()->id)->whereYear('date', date('Y'))->where('type', 'inflow')->sum('value');

        $flow_month = $flow_year_sum / 12;

        switch ($flow_year_sum) {
            case ($flow_year_sum<=10225):
                $flow_taxe = $flow_year_sum;
                break;
            case ($flow_year_sum<=26070):
                $flow_year_sum_calc = $flow_year_sum * 11;
                $flow_year_sum_calc = $flow_year_sum_calc / 100;
                $flow_taxe = $flow_year_sum_calc;
                break;
            case ($flow_year_sum<=74545):
                $flow_year_sum_calc = $flow_year_sum * 30;
                $flow_year_sum_calc = $flow_year_sum_calc / 100;
                $flow_taxe = $flow_year_sum_calc;
                break;
            case ($flow_year_sum<=160336):
                $flow_year_sum_calc = $flow_year_sum * 41;
                $flow_year_sum_calc = $flow_year_sum_calc / 100;
                $flow_taxe = $flow_year_sum_calc;
                break;
            case ($flow_year_sum>=160337):
                $flow_year_sum_calc = $flow_year_sum * 45;
                $flow_year_sum_calc = $flow_year_sum_calc / 100;
                $flow_taxe = $flow_year_sum_calc;
                break;
            default:
                $flow_taxe = $flow_year_sum;
                break;
        }

        $flow_taxe = $flow_taxe - $flow_year_outflow;

        $flow_month_taxe = $flow_taxe / 12;

        $flow_fullOut = $flow_taxe - $flow_year_outflow;
        $flow_month_fullOut = $flow_fullOut / 12;

        $flow_year_sum = number_format($flow_year_sum, 2, '.', ' '); // CA brut
        $flow_month = number_format($flow_month, 2, '.', ' '); // salaire brut
        $flow_taxe = number_format($flow_taxe, 2, '.', ' '); // CA net
        $flow_month_taxe = number_format($flow_month_taxe, 2, '.', ' '); // salaire net
        $flow_month_fullOut = number_format($flow_month_fullOut, 2, '.', ' '); // salaire potentielle

        

        /* 
        2022
        Jusqu'à 10 225 €	0 %
        De 10 226 € à 26 070 €	11 %
        De 26 071 € à 74 545 €	30 %
        De 74 546 € à 160 336 €	41 %
        Supérieur à 160 336 €	45 % 
        */
        
        return view('stage.salary', compact('flow_year_sum', 'flow_month', 'flow_taxe', 'flow_month_taxe', 'flow_month_fullOut'));
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
        $flows = Flow::select(DB::raw("COUNT(*) as count"), "value")
                    ->orderBy('user_id','ASC')
                    ->pluck('count', 'value');
        $outflows = Outflow::select(DB::raw("COUNT(*) as count"), "value")
                    ->orderBy('user_id','ASC')
                    ->pluck('count', 'value');
        
        return view('stage.salary', compact('flows', 'outflows'));
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

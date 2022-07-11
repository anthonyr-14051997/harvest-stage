<?php

namespace App\Http\Controllers;
    
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Inflow;
use DB;
    
class ChartJSController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index()
    {
        $inflows = Inflow::select(DB::raw("COUNT(*) as count"), DB::raw("value as val"))
                    ->where('value')
                    ->groupBy(DB::raw("val"))
                    ->orderBy('user_id','ASC')
                    ->pluck('count', 'val');
 
        $labels = $inflows->keys();
        $data = $inflows->values();
              
        return view('chart', compact('labels', 'data'));
    }
}

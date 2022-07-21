<?php

namespace App\Http\Controllers;
    
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Flow;
use DB;
    
class ChartJSController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    /* public function index()
    {
        $users = User::select(DB::raw("COUNT(*) as count"), DB::raw("MONTHNAME(created_at) as month_name"))
                    ->whereYear('created_at', date('Y'))
                    ->groupBy(DB::raw("month_name"))
                    ->orderBy('id','ASC')
                    ->pluck('count', 'month_name');
 
        $labels = $users->keys();
        $data = $users->values();
              
        return view('chart', compact('labels', 'data'));
    } */

    public function index()
    {
        $flows = Flow::select(DB::raw("COUNT(*) as count"), "value")
                    ->orderBy('user_id','ASC')
                    ->pluck('count', 'value');
 
        $labels = $flows->keys();
        $data = $flows->values();
              
        return view('chart', compact('labels', 'data'));
    }
}

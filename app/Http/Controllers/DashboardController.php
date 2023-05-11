<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Apparatus;
use App\Models\Chemicals;
use App\Models\Breakages;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index');
    }

    public function sum(Request $request)
    {
        $apparatus=Apparatus::get();
        $apparatussum= count($apparatus);

        $chemicals = Chemicals::get();
        $chemicalsSum = count($chemicals);

        $breakages=Breakages::get();
        $breakagesSum= count($breakages);

        $data=[
            'apparatus'=> $apparatussum,
            'chemicals'=> $chemicalsSum,
            'breakages'=> $breakagesSum
        ];
        return view('dashboard.index',$data );
       
        

    }
}

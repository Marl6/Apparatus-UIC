<?php

namespace App\Http\Controllers;

use Yajra\DataTables\Facades\Datatables;
use Illuminate\Http\Request;
use App\Models\Apparatus;
<<<<<<< HEAD
=======
use App\Models\Chemicals;
use App\Models\Breakages;
>>>>>>> 4aa3f620f88db01ece818bcb6199903e7770a4d8

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index');
    }

<<<<<<< HEAD
    public function getApparatus(Request $request)
    {
        if($request->ajax()){
            $apparatus = Apparatus::get()->all();
                return Datatables::of($apparatus)
                    ->addIndexColumn()
                    ->editColumn('time', function($data){
                        $time = strtotime($data->time);
                        return date("g:i a", $time);
                    })
                    ->editColumn('course', function ($apparatus){
                        return $apparatus->course . " " . $apparatus->section;
                    })
                    ->make(true);
        }
         return view('dashboard.index');
       
=======
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
       
        

>>>>>>> 4aa3f620f88db01ece818bcb6199903e7770a4d8
    }
}

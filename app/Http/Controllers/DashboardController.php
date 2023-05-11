<?php

namespace App\Http\Controllers;

use Yajra\DataTables\Facades\Datatables;
use Illuminate\Http\Request;
use App\Models\Apparatus;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index');
    }

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
       
    }
}

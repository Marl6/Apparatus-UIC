<?php

namespace App\Http\Controllers;

use App\Models\Apparatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\Datatables;

class returnHistoryController extends Controller
{
    public function index(Request $request)
    {
        if($request->ajax()){
            $apparatus = Apparatus::where('borrow_status', 'returned')->get();  
                return Datatables::of($apparatus)
                    ->addIndexColumn()
                    ->editColumn('time', function($data){
                        $time = strtotime($data->time);
                        return date("g:i a", $time);
                    })
                    ->editColumn('course', function ($apparatus){
                        return $apparatus->course . " " .  $apparatus->year . "-" . $apparatus->section;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        $apparatus_inventory = DB::table('apparatusInventory')->pluck('apparatus_name', 'id')->toArray();
        $teachers = DB::table('teachers')->pluck('last_name', 'id')->toArray();
        $course_title = DB::table('courses')->pluck('course_title', 'id')->toArray();
        return view('returnHistory.returnHistory-list', [
            'teachers' => $teachers,
            'apparatusInventory' => $apparatus_inventory,
            'course_title' => $course_title
            ]);
                //return view('apparatus.apparatus-list');
    }
}
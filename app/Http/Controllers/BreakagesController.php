<?php

namespace App\Http\Controllers;

use App\Models\Breakages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\Datatables;

class BreakagesController extends Controller
{
    public function addBreakages(Request $request)
    {
        $breakages = new Breakages;
        $breakages->group_no = $request->group_no;
        $breakages->requisition_id = $request->requisition_id;
        $breakages->quantity = $request->quantity;
        $breakages->amount = $request->amount;
        $breakages->datetime_added = $request->datetime_added;
        $breakages->datetime_update = $request->datetime_update;
        $breakages->statuscode = $request->statuscode;
        $breakages->save();

        return redirect()->route('Breakages');
    }

    public function index(Request $request)
    {
        if($request->ajax()){
            $breakages = Breakages::get()->all();
                return Datatables::of($breakages)
                    ->addIndexColumn()
                    ->addColumn('action', function($breakages){
                        $btn = '<a href="javascript:void(0)"data-toggle="tooltip" data-id="'.$breakages->id.'" data-original-title="Edit" class="editBtn btn bTN-SUCCESS mb-0"><i class="bi bi-pencil-square">EDIT</i></a> ';
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('Breakages');
    }
}

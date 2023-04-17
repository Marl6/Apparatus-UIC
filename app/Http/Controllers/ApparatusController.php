<?php

namespace App\Http\Controllers;

use App\Models\Apparatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\Datatables;

class ApparatusController extends Controller
{
    public function addApparatus(Request $request)
    {
        $apparatus = new Apparatus;
        $apparatus->subject = $request->subject;
        $apparatus->course = $request->course;
        $apparatus->year = $request->year;
        $apparatus->section = $request->section;
        $apparatus->date_to_be_used = $request->date_to_be_used;
        $apparatus->group_no = $request->group_no;
        $apparatus->teacher = $request->teacher;
        $apparatus->experiment_no = $request->experiment_no;
        $apparatus->time = $request->time;
        $apparatus->items = $request->items;
        $apparatus->quantity = $request->quantity;
        $apparatus->remarks = $request->remarks;
        $apparatus->save();

        return view('apparatus');
        // return $apparatus;
    }

    public function index(Request $request)
    {
        if($request->ajax()){
            $apparatus = Apparatus::get()->all();
                return Datatables::of($apparatus)
                    ->addIndexColumn()
                    ->addColumn('action', function($apparatus){
                        $btn = '<a href="javascript:void(0)"data-toggle="tooltip" data-id="'.$apparatus->id.'" data-original-title="Edit" class="editBtn btn btn-success mb-0"><i class="bi bi-pencil-square">EDIT</i></a> ';
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('apparatus');
    }
}
	// public function apparatus_list(){

	// 	$list = DB::select("EXEC pr_apparatus_list");

	// 	$array_value = [
    //             "apparatus_list" => $list
	// 		];
	// 		return view('apparatus.apparatus_list', compact('array_value'));
	// }

	// public function save_new_apparatus(Request $request){
	// 	$param = [ $request->input('apparatus_name'), 0 ];
	// 	$query = "ExEC pr_apparatus_ins :label, :result_id;";
	// 	$result = DB::select($query, $param);

	// 		return redirect('/apparatus_list');
	// }

	// public function get_appartus_by_id($id){
	// 	$param = [ $id ];
	// 	$query = "ExEC pr_apparatus_by_id_sel :apparatus_id;";
	// 	$result = DB::select($query, $param);

	// 	$array_value = [
	// 		"apparatus" => $result
	// 	];
	// 	return view('apparatus.apparatus_update', compact('array_value'));
	// }


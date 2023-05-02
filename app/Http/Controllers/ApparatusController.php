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
        try {
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

            return response()->json([
                "message" => "You successfully added the apparatus.",
                "success" => true
            ], 200);

        } catch (\Exception $ex) {
            return response()->json([
                "message" => "Oops...!, adding the apparatus has failed. Please try again.",
                "success" => false
            ], 200);
        }
        // return redirect()->route('apparatus');
    }

    public function index(Request $request)
    {
        if($request->ajax()){
            $apparatus = Apparatus::get()->all();
                return Datatables::of($apparatus)
                    ->addIndexColumn()
                    ->addColumn('action', function($apparatus){
                        $apparatusObj = (object) $apparatus;
                        $btn = '<button type="button" id="btnUpdate" class="btn btn-success mb-0" data-bs-toggle="modal" data-bs-target="#editModal" onclick="updateBtn('. $apparatus->id .')"><i class="bi bi-pencil-square">EDIT</i></button>' . ' ' .
                               '<button type="button" id="btnDelete" class="btn btn-success mb-0" onclick="deleteBtn('. $apparatus->id . ')"><i class="bi bi-pencil-square">DELETE</i></button>';
                        return $btn;

                    })->editColumn('time', function($data){
                        $time = strtotime($data->time);
                        return date("g:i a", $time);
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('apparatus.apparatus-list');
    }
    public function deleteApparatus(Request $request)
    {
        $apparatus = Apparatus::findOrFail($request->id)->delete();
        try {
            return response()->json([
                "message" => "You successfully deleted the apparatus.",
                "success" => true
            ], 200);
        } catch (\Exception $ex) {
            return response()->json([
                "message" => "Oops...!, deleting the apparatus has failed. Please try again.",
                "success" => false
            ], 200);
        }
    }
    public function findApparatus($id)
    {
        $apparatus = Apparatus::findOrFail($id);

        return response()->json([
            "data" => $apparatus
        ], 200);
    }
    public function updateApparatus(Request $request){

        $apparatus = Apparatus::where('id', $request->input('id'))->update([
            'subject' => $request->input('subject'),
            'course' => $request->input('course'),
            'year' => $request->input('year'),
            'section' => $request->input('section'),
            'date_to_be_used' => $request->input('date_to_be_used'),
            'group_no' => $request->input('group_no'),
            'teacher' => $request->input('teacher'),
            'experiment_no' => $request->input('experiment_no'),
            'time' => $request->input('time'),
            'items' => $request->input('items'),
            'quantity' => $request->input('quantity'),
            'remarks' => $request->input('remarks'),
          ]);
          return redirect()->back();
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


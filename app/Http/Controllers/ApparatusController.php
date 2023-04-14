<?php

namespace App\Http\Controllers;

use App\Models\Apparatus;
use Illuminate\Http\Request;
<<<<<<< HEAD
// use Illuminate\Support\Facades\DB;

class ApparatusController extends Controller
{
    public function addApparatus(Request $request)
    {
         $apparatus = new Apparatus;
         $apparatus->subject = $request->subject;
         $apparatus->course = $request->course;
         $apparatus->year = $request->Year;
         $apparatus->section = $request->section;
         $apparatus->date_to_be_used = $request->Datetobeused;
         $apparatus->group_no = $request->GroupNo;
         $apparatus->teacher = $request->teacher;
         $apparatus->experiment_no = $request->ExperimentNo;
         $apparatus->time = $request->time;
         $apparatus->items = $request->item;
         $apparatus->quantity = $request->quantity;
         $apparatus->remarks = $request->remarks;
         $apparatus->updated_at = $request->updated_at;
         $apparatus->created_at = $request->created_at;
         $apparatus->save();

        // $param = [
        //           $request->input('subject'),
        //           $request->input('course'),
        //           $request->input('Year'),
        //           $request->input('section'),
        //           $request->input('Datetobeused'),
        //           $request->input('GroupNo'),
        //           $request->input('teacher'),
        //           $request->input('ExperimentNo'),
        //           $request->input('time'),
        //           $request->input('item'),
        //           $request->input('quantity'),
        //           $request->input('remarks'),
        //           0
        //         ];
        // $query = "EXEC pr_apparatus_ins :subject, :course, :Year, :section, :Datetobeused, :GroupNo, :teacher, :ExperimentNo, :time, :item, :quantity, :remarks, :result_id;";
        // $result = DB::select($query, $param);

        // dd($result);

        return redirect()->route('apparatus');
    }
=======
use Illuminate\Support\Facades\DB;

class ApparatusController extends Controller
{
	public function apparatus_list(){

		$list = DB::select("EXEC pr_apparatus_list");

		$array_value = [
										"apparatus_list" => $list
									];
			return view('apparatus.apparatus_list', compact('array_value'));
	}
    
	public function save_new_apparatus(Request $request){
		$param = [ $request->input('apparatus_name'), 0 ];
		$query = "ExEC pr_apparatus_ins :label, :result_id;";
		$result = DB::select($query, $param);

			return redirect('/apparatus_list');
	}

	// public function get_appartus_by_id($id){
	// 	$param = [ $id ];
	// 	$query = "ExEC pr_apparatus_by_id_sel :apparatus_id;";
	// 	$result = DB::select($query, $param);

	// 	$array_value = [
	// 		"apparatus" => $result
	// 	];
	// 	return view('apparatus.apparatus_update', compact('array_value'));
	// }
>>>>>>> 2395e77f9198e275fcb8076d176c175d81c2281a
}

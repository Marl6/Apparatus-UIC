<?php

namespace App\Http\Controllers;

use App\Models\Apparatus;
use Illuminate\Http\Request;
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
}

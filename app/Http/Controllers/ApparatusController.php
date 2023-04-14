<?php

namespace App\Http\Controllers;

use App\Models\Apparatus;
use Illuminate\Http\Request;
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
}

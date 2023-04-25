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
                        $btn = '<button type="button" id="btnUpdate" class="btn btn-success mb-0" data-bs-toggle="modal" data-bs-target="#editModal" onclick="updateBtn('. $breakages->id .')"><i class="bi bi-pencil-square">EDIT</i></button>' . ' ' .
                               '<button type="button" id="btnDelete" class="btn btn-success mb-0" onclick="deleteBtn('. $breakages->id . ')"><i class="bi bi-pencil-square">DELETE</i></button>';
                            return $btn;

                    })->editColumn('time', function($data){
                        $time = strtotime($data->time);
                        return date("g:i a", $time);
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('Breakages');
    }
    public function deleteBreakages(Request $request)
    {
        $breakages = Breakages::findOrFail($request->id)->delete();
        try {
            return response()->json([
                "message" => "You successfully deleted the breakages.",
                "success" => true
            ], 200);
        } catch (\Exception $ex) {
            return response()->json([
                "message" => "Oops...!, deleting the breakages has failed. Please try again.",
                "success" => false
            ], 200);

        }
    }
    public function findBreakages($id)
    {
        $breakages = Breakages::findOrFail($id);

        return response()->json([
            "data" => $breakages
        ], 200);
    }

    public function updateBreakages(Request $request){
        $breakages = Breakages::where('id', $request->input('id'))->update([
            'group_no' => $request->input('group_no'),
            'requisition_id' => $request->input('requisition_id'),
            'quantity' => $request->input('quantity'),
            'amount' => $request->input('amount'),
            'datetime_added' => $request->input('datetime_added'),
            'datetime_update' => $request->input('datetime_update'),
            'statuscode' => $request->input('statuscode'),
            // 'urls'=> $request->input('urls'),
            // 'categorie_id'=> $request->input('categorie_id')
          ]);
          return redirect()->back();
        }
    }




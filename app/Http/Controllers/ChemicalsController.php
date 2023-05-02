<?php

namespace App\Http\Controllers;

use Yajra\DataTables\Facades\Datatables;
use Illuminate\Http\Request;
use App\Models\Chemicals;
use Illuminate\Support\Facades\DB;

class ChemicalsController extends Controller
{
    public function addChemicals(Request $request)
    {
        try{
            $chemicals = new Chemicals;
            $chemicals->date_requested = $request->date_requested;
            $chemicals->date_to_be_used = $request->date_to_be_used;
            $chemicals->chemical_name = $request->chemical;
            $chemicals->quantity = $request->quantity;
            $chemicals->requested_by = $request->requested_by;
            $chemicals->prepared_by = $request->prepared_by;
            $chemicals->save();

            return view('chemicals.chemicals-list');

            return response()->json([
                "message" => "You successfully added the chemicals.",
                "success" => true
            ], 200);

        }catch (\Exception $ex) {
            return response()->json([
                "message" => "Oops...!, adding the chemicals has failed. Please try again.",
                "success" => false
            ], 200);
        }
        // return redirect()->route('apparatus');
    }

    public function index(Request $request)
    {
        if($request->ajax()){
            $chemicals = Chemicals::get()->all();
                return Datatables::of($chemicals)
                    ->addIndexColumn()
                    ->addColumn('action', function($chemicals){
                        $btn = '<button type="button" id="btnUpdate" class="btn btn-success mb-0" data-bs-toggle="modal" data-bs-target="#editModal" onclick="updateBtn('. $chemicals->id .')"><i class="bi bi-pencil-square">EDIT</i></button>' . ' ' .
                               '<button type="button" id="btnDelete" class="btn btn-success mb-0" onclick="deleteBtn('. $chemicals->id . ')"><i class="bi bi-pencil-square">DELETE</i></button>';
                        return $btn;

                    })->editColumn('time', function($data){
                        $time = strtotime($data->time);
                        return date("g:i a", $time);
                    })
                    ->rawColumns(['action'])
                    ->make(true);
                    return $allData;
        }
        return view('chemicals.chemicals-list');
    }
    public function deleteChemicals(Request $request)
    {
        $chemicals = Chemicals::findOrFail($request->id)->delete();
        try {
            return response()->json([
                "message" => "You successfully deleted the chemicals.",
                "success" => true
            ], 200);
        } catch (\Exception $ex) {
            return response()->json([
                "message" => "Oops...!, deleting the chemicals has failed. Please try again.",
                "success" => false
            ], 200);

        }
    }
    public function findChemicals($id)
    {
        $chemicals = Chemicals::findOrFail($id);

        return response()->json([
            "data" => $chemicals
        ], 200);
    }

    public function updateChemicals(Request $request){

        $chemicals = Chemicals::where('id', $request->input('id'))->update([
            'date_requested' => $request->input('date_requested'),
            'date_to_be_used' => $request->input('date_to_be_used'),
            'chemical_name' => $request->input('chemical_name'),
            'quantity' => $request->input('quantity'),
            'requested_by' => $request->input('requested_by'),
            'prepared_by' => $request->input('prepared_by'),
          ]);
          return redirect()->back();
    }
}

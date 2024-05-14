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
        // Generate a unique random requisition_id
        //$requisitionId = $this->generateUniqueRequisitionId();
    
        // Create a new Breakages instance
        $breakages = new Breakages;
        
        // Fill the Breakages model with request data
        $breakages->group_no = $request->group_no;
        $breakages->group_leader = $request->group_leader;
        $breakages->requisition_id = $request->requisition_id;
        $breakages->apparatus_name = $request->apparatus_name;
        $breakages->quantity = $request->quantity;
        $breakages->amount = $request->amount;
        $breakages->datetime_paid = $request->datetime_paid;
        $breakages->statuscode = $request->statuscode;
        
        // Save the Breakages model to the database
        $breakages->save();
    
        // Redirect to the Breakages route
        return redirect()->route('Breakages');
    }
    
    private function generateUniqueRequisitionId()
    {
        // Generate a random requisition_id
        $requisitionId = mt_rand(100000, 999999); // Adjust range as needed
    
        // Check if the requisition_id already exists in the database
        while (Breakages::where('requisition_id', $requisitionId)->exists()) {
            // If the requisition_id exists, generate a new one until unique
            $requisitionId = mt_rand(100000, 999999); // Adjust range as needed
        }
    
        return $requisitionId;
    }
    

    public function index(Request $request)
    {
        if($request->ajax()){
            # formerly: $breakages = Breakages::get()->all(); 
            $breakages = Breakages::where('statuscode', 'unpaid')->get();                
            return Datatables::of($breakages)
                    ->addIndexColumn()
                    ->addColumn('action', function($breakages){
                        $btn = '<button type="button" id="btnUpdate" class="btn btn-success mb-0" data-bs-toggle="modal" data-bs-target="#editModal" onclick="updateBtn('. $breakages->id .')"><i class="bi bi-pencil-square">EDIT</i></button>' . ' ' .
                               '<button type="button" id="btnDelete" class="btn btn-success mb-0" onclick="deleteBtn('. $breakages->id . ')"><i class="bi bi-pencil-square">DELETE</i></button>';
                            return $btn;

                    })->editColumn('time', function($breakages){
                        $time = strtotime($breakages->time);
                        return date("g:i a", $time);
                    })
                    ->editColumn('datetime_paid', function($breakages){
                        $datetime_paid = strtotime($breakages->datetime_paid);
                        return date("F j, Y ", $datetime_paid);
                    })
                    ->editColumn('statuscode', function($breakages){
                        return $breakages->statuscode;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        $apparatus_inventory = DB::table('apparatusInventory')->pluck('apparatus_name', 'id')->toArray();
        return view('Breakages', ['apparatusInventory' => $apparatus_inventory]);
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
            'group_leader' => $request->input('group_leader'),
            'requisition_id' => $request->input('requisition_id'),
            'apparatus_name' => $request->input('apparatus_name'),
            'quantity' => $request->input('quantity'),
            'amount' => $request->input('amount'),
            'datetime_paid' => $request->input('datetime_paid'),
            // 'created_at' => $request->input('created_at'),
            'statuscode' => $request->input('statuscode'),
          ]);
          return redirect()->back();
        }
    }




<?php

namespace App\Http\Controllers;

use App\Models\Breakages;
use Illuminate\Http\Request;

class BreakagesController extends Controller
{
    public function addBreakages(Request $request)
    {
        $breakages = new Breakages;
        $breakages->group_no = $request->groupno    ;
        $breakages->requisition_id = $request->requisitionid;
        $breakages->quantity = $request->quantity;
        $breakages->amount = $request->amount;  
        $breakages->datetime_added = $request->datetime_added;
        $breakages->datetime_update = $request->update;
        $breakages->statuscode = $request->code;
        $breakages->updated_at = $request->updated_at;
        $breakages->created_at = $request->created_at ;
        $breakages->save();

        return redirect()->route('Breakages');
    }
}

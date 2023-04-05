
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserManagementController extends Controller
{
    public function addItem(Request $request)
    {
        // dd($request);
        $user = new Item;
        $user->Subject = $request->Subject;
        $user->CourseYrSection = $request->CourseYrSection;
        $user->Datetobeused = $request->Datetobeused;
        $user->Teacher = $request->Teacher;
        $user->ExperimentNo = $request->ExperimentNo;
        $user->Time = $request->Time;
        $user->Items = $request->Items;
        $user->Quantity = $request->Quantity;
        $user->Remarks = $request->Remarks;
        $user->save();

        return redirect()->route('dashboard');
    }
}

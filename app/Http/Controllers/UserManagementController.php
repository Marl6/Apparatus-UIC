<?php

namespace App\Http\Controllers;

use Yajra\DataTables\Facades\Datatables;
use Illuminate\Http\Request;
use App\Models\User;

class UserManagementController extends Controller
{
    public function index(Request $request)
    {
        if($request->ajax()){
            $user = User::get()->all();
            return Datatables::of($user)
                ->addIndexColumn()
                ->addColumn('action', function($user){
                    $btn = '<button type="button" id="btnUpdate" class="btn btn-success mb-0" data-bs-toggle="modal" data-bs-target="#editModal" onclick="updateBtn('. $user->id .')"><i class="bi bi-pencil-square">EDIT</i></button>' . ' ' .
                           '<button type="button" id="btnDelete" class="btn btn-success mb-0" onclick="deleteBtn('. $user->id . ')"><i class="bi bi-pencil-square">DELETE</i></button>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('user-management.user-management-list');
    }

    public function addUser(Request $request)
    {
        // dd($request);
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->save();

        return redirect()->route('user-management');

    }

    public function getUser(Request $request)
    {
        $users = User::get()->all();
        return view('user-management', compact('users'));
    }

    public function edit(Request $request)
    {


    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserManagementController extends Controller
{
    public function index(Request $request)
    {

        if($request->ajax()){

            $user = User::latest()->get();

            return Datatables::of($user)
                    ->addIndexColumn()
                    // ->addColumn('action', function($row){
                    //     $btn = '<a href="javascript:void(0)" data-toggle="tooltip" data-id="'.$row->id.'" data-original-title="Edit" class="btn editbtn btn-sm"><span class="badge bg-success">Edit</a  > ';
                    //     $btn.= '<a href="javascript:void(0)" data-toggle="tooltip" data-id="'.$row->id.'" data-original-title="Delete" class="btn deletebtn btn-sm"><span class="badge bg-danger">Delete</a  > ';
                    //         return $btn;
                    // })
                    ->editColumn('id',function($user){
                        return 'dasdasd';
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('user-management.user-management');
    }

    public function addUser(Request $request)
    {
        // dd($request);
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->save();

        return redirect()->route('dashboard');

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

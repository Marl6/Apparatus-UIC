<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class TeacherController extends Controller{
    public function index()
    {
        $teachers = DB::table('teachers')->pluck('last_name', 'id'); // Retrieve last names as values and IDs as keys

        return view('apparatus.apparatus-list', compact('teachers'));
    }
}
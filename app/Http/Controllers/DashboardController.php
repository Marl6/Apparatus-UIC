<?php

namespace App\Http\Controllers;

use Yajra\DataTables\Facades\Datatables;
use Illuminate\Http\Request;
use App\Models\Apparatus;
use App\Models\Chemicals;
use App\Models\Breakages;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $data = $this->sum($request);
        return view('dashboard.index', $data);
    }

    public function sum(Request $request)
    {
        $apparatus=Apparatus::get();
        $apparatussum= count($apparatus);

        $chemicals = Chemicals::get();
        $chemicalsSum = count($chemicals);

        $breakages=Breakages::get();
        $breakagesSum= count($breakages);


        // Query to get count of borrowings per month
        $borrowingsPerProgram = Apparatus::selectRaw('course, COUNT(*) as count')
        ->groupBy('course')
        ->get();

    // Transforming the result into an associative array for easier use in the view
        $borrowingsData = [];
        foreach ($borrowingsPerProgram as $item) {
            $borrowingsData[$item->course] = $item->count;
        }


        $data=[
            'apparatus'=> $apparatussum,
            'chemicals'=> $chemicalsSum,
            'breakages'=> $breakagesSum,
            'borrowingsData' => $borrowingsData,
        ];
        return  $data;
    }
}

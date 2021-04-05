<?php

namespace App\Http\Controllers;

use App\Position;
use App\Workunit;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    //
    public function get_workunits(Request $request)
    {
        $workunits = Workunit::when($request->search, function ($q, $search) {
            return $q->where('name', 'like', '%' . $search . '%');
        })->get();
        return response()->json($workunits);
    }

    public function get_positions(Request $request)
    {
        $positions = Position::when($request->search, function ($q, $search) {
            return $q->where('name', 'like', '%' . $search . '%');
        })->get();
        return response()->json($positions);
    }
}

<?php

namespace App\Http\Controllers;

use App\Position;
use App\Workunit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class WorkunitController extends Controller
{
    //
    public function workunit_index()
    {
        return view('pages.admin.master_workunit');
    }

    public function datatable_workunit(Request $request)
    {
        $search = $request->search['value'];
        $limit = $request->length;
        $start = $request->start;
        $order_index = $request->order[0]['column'];
        $order_field = $request->columns[$order_index]['data'];
        $order_ascdesc = $request->order[0]['dir'];

        $sql_total = Workunit::get()->count();
        $sql_data = Workunit::when($search, function ($q, $search) {
            return $q->where('name', 'like', '%' . $search . '%')->orWhere('baes1', 'like', '%' . $search . '%')->orWhere('code', 'like', '%' . $search . '%');
        })->skip($start)->take($limit)->orderBy($order_field, $order_ascdesc)->get();

        ($search) ? $sql_filter = count($sql_data) : $sql_filter = $sql_total;

        $callback = [
            'draw' => intval($request->draw),
            'recordsTotal' => intval($sql_total),
            'recordsFiltered' => intval($sql_filter),
            'data' => $sql_data
        ];

        return response()->json($callback, 200)->header('Content-Type', 'application/json');
    }
}

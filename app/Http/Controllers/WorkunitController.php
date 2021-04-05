<?php

namespace App\Http\Controllers;

use App\Workunit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WorkunitController extends Controller
{
    //
    public function workunit_index()
    {
        return view('pages.admin.master_workunit');
    }

    public function workunit_get(Request $request)
    {
        $this->validate($request, [
            'id' => 'required',
        ]);

        $workunit = Workunit::where('id',  intval($request->id))->first();
        if ($workunit) {
            return response()->json($workunit, 200);
        }
        return response()->json();
    }

    public function workunit_store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:5|max:255',
            'code' => 'required|min:3|max:255|unique:workunits',
            'baes1' => 'required|min:3|max:255',
        ]);

        $workunit = new Workunit();
        $workunit->name = strtoupper($request->name);
        $workunit->code = $request->code;
        $workunit->baes1 = $request->baes1;
        if ($workunit->save()) {
            return response()->json(['message' => 'Item "' . $workunit->name . '" berhasil ditambahkan.'], 200);
        }
        return response()->json();
    }

    public function workunit_update(Request $request)
    {
        $this->validate($request, [
            'id' => 'required',
            'name' => 'required|min:3|max:255',
        ]);

        $workunit = Workunit::find(intval($request->id));
        $workunit->name = $request->name;
        if ($workunit->save()) {
            return response()->json(['message' => 'Item berhasil diubah menjadi "' . $workunit->name . '".'], 200);
        }
        return response()->json();
    }

    public function workunit_destroy(Request $request)
    {
        $this->validate($request, [
            'id' => 'required|not_in:' . Auth::user()->workunit->id,
        ]);

        $workunit = Workunit::find(intval($request->id));
        if ($workunit->delete(intval($request->id))) {
            return response()->json(['message' => 'Item "' . $workunit->name . '" berhasil dihapus.'], 200);
        }
        return response()->json();
    }

    public function workunit_restore(Request $request)
    {
        $this->validate($request, [
            'id' => 'required',
        ]);

        $workunit = Workunit::onlyTrashed()->find(intval($request->id));
        if ($workunit->restore()) {
            return response()->json(['message' => 'Item "' . $workunit->name . '" berhasil direstore.'], 200);
        }
        return response()->json();
    }

    public function workunit_destroy_permanent(Request $request)
    {
        $this->validate($request, [
            'id' => 'required',
        ]);

        $workunit = Workunit::onlyTrashed()->find(intval($request->id));
        if ($workunit->forceDelete()) {
            return response()->json(['message' => 'Item "' . $workunit->name . '" secara permanen dihapus.'], 200);
        }
        return response()->json();
    }

    # -----------------------------------------------------------------
    # SCRIPT RESPONSE DATATABLE ---------------------------------------
    # Pusing Banget Ga Tuh!
    # Semangat
    # -----------------------------------------------------------------
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

    public function datatable_trash_workunit(Request $request)
    {
        $search = $request->search['value'];
        $limit = $request->length;
        $start = $request->start;
        $order_index = $request->order[0]['column'];
        $order_field = $request->columns[$order_index]['data'];
        $order_ascdesc = $request->order[0]['dir'];

        $sql_total = Workunit::onlyTrashed()->get()->count();
        $sql_data = Workunit::onlyTrashed()->when($search, function ($q, $search) {
            return $q->where('name', 'like', '%' . $search . '%')->orWhere('baes1', 'like', '%' . $search . '%')->orWhere('code', 'like', '%' . $search . '%');
        })->skip($start)->take($limit)->orderBy($order_field, $order_ascdesc)->get();

        ($search) ? $sql_filter = count($sql_data) : $sql_filter = $sql_total;

        $callback = [
            'draw' => $request->draw,
            'recordsTotal' => $sql_total,
            'recordsFiltered' => $sql_filter,
            'data' => $sql_data
        ];

        return response()->json($callback, 200)->header('Content-Type', 'application/json');
    }
}

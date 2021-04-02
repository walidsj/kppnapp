<?php

namespace App\Http\Controllers;

use App\Agenda;
use App\Workunit;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class AgendaController extends Controller
{
    //
    public function index()
    {
        $agenda = new Agenda();
        $agenda_list = $agenda->where('end_date', '<', Carbon::now())->where(function ($query) {
            $query->whereNull('workunit_id')->orWhereRaw('FIND_IN_SET("' . Auth::user()->workunit_id . '",workunit_id)');
        })->orderBy('end_date', 'desc')->get()->groupBy(function ($date) {
            return Carbon::parse($date->start_date)->isoFormat('MMMM YYYY');
        });
        return view('pages.agendas.agenda_list', compact('agenda_list'));
    }

    public function detail($slug)
    {
        $agenda = new Agenda();
        $workunit = new Workunit();
        $agenda_item = $agenda->where('slug', $slug)->firstOrFail();
        $workunits = [];

        if ($agenda_item->workunit_id) {
            $workunit_id = explode(',', $agenda_item->workunit_id);
            $workunits = $workunit->whereIn('id', $workunit_id)->get();
        }
        return view('pages.agendas.agenda_detail', compact('agenda_item', 'workunits'));
    }

    public function get_api_detail($id)
    {
        $agenda = new Agenda();
        $workunit = new Workunit();
        $agenda_item = $agenda->findOrFail($id);
        $workunits = [];

        if ($agenda_item->workunit_id) {
            $workunit_id = explode(',', $agenda_item->workunit_id);
            $workunits = $workunit->whereIn('id', $workunit_id)->get();
        }
        return compact('agenda_item', 'workunits');
    }
}

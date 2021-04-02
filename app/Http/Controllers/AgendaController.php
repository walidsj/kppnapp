<?php

namespace App\Http\Controllers;

use App\Agenda;
use App\Workunit;
use Illuminate\Http\Request;

class AgendaController extends Controller
{
    //
    public function index()
    {
        return view('pages.agendas.agenda_list');
    }

    public function detail($slug)
    {
        $agenda = new Agenda();
        $workunit = new Workunit();
        $workunits = [];
        $agenda_item = $agenda->where('slug', $slug)->firstOrFail();

        if ($agenda_item->workunit_id) {
            $workunit_id = explode(',', $agenda_item->workunit_id);
            $workunits = $workunit->whereIn('id', $workunit_id)->get();
        }
        return view('pages.agendas.agenda_detail', compact('agenda_item', 'workunits'));
    }
}

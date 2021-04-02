<?php

namespace App\Http\Controllers;

use App\Agenda;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class UpcomingAgendaController extends Controller
{
    //
    public function index()
    {
        $agenda = new Agenda;
        $upcoming_agendas = $agenda->where('start_date', '>', Carbon::now())->where(function ($query) {
            $query->whereNull('workunit_id')->orWhereRaw('FIND_IN_SET("' . Auth::user()->workunit_id . '",workunit_id)');
        })->get()->groupBy(function ($date) {
            return Carbon::parse($date->start_date)->isoFormat('MMMM YYYY');
        });

        return view('pages.upcoming-agenda', compact('upcoming_agendas'));
    }

    public function get_api()
    {
        $agenda = new Agenda;
        $upcoming_agendas = $agenda->where('start_date', '>', Carbon::now())
            // ->where(function ($query) {
            //     $query->whereNull('workunit_id')->orWhereRaw('FIND_IN_SET("' . Auth::user()->workunit_id . '",workunit_id)');
            // })
            ->get()
            // ->groupBy(function ($date) {
            //     return Carbon::parse($date->start_date)->isoFormat('MMMM YYYY');
            // })
        ;

        return response()->json([
            'status' => 'success',
            'message' => 'Data berhasil ditemukan.',
            'rows' => count($upcoming_agendas),
            'data' => $upcoming_agendas
        ], 200);
    }
}

<?php

namespace App\Http\Controllers;

use App\Agenda;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware(['auth', 'verified']);
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $agenda = new Agenda;
        $monthly_agendas = $agenda->whereMonth('start', '=', Carbon::now())->where(function ($query) {
            $query->whereNull('workunit_id')->orWhereRaw('FIND_IN_SET("' . Auth::user()->workunit_id . '",workunit_id)');
        })->get();

        return view('pages.home', compact('monthly_agendas'));
    }
}

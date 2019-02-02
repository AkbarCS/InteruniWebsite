<?php

namespace App\Http\Controllers;

use Auth;
use App\Flight;
use App\Jobs\ParseFlight;
use Illuminate\Http\Request;
use Theomessin\IGCParser\Repository\Parser;

class FlightsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('flights.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Parser $parser)
    {
        $this->validate($request, [
            'flightlog' => 'required|file',
            'type' => 'required|in:soaring,crosscountry',
        ]);

        $flight = Auth::user()->flights()->create([
            'type' => $request->type,
            'filename' => $request->flightlog->store('flightlogs'),
        ]);

        $job = (new ParseFlight($flight))->delay(05);
        $this->dispatch($job);

        return redirect()->route('flights.show', $flight)->with('status', 'uploaded');
    }

    /**
     * Display the specified resource.
     *
     * @param Flight $flight
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function show(Flight $flight)
    {
        return view('flights.show')->with(compact('flight'));
    }
	
}

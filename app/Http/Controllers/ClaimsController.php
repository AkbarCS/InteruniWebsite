<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class ClaimsController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('claims.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'date' => 'required|date_format:d/m/Y',
            'claims' => 'required|array',
        ]);

        $points = [
            100, 50, 50, 50, 50, 50, 50, 100, 100, 50, 100,
            50, 50, 100, 50, 100, 50, 50, 50, 50, 50, 50, 50,
            100, 100, 50, 50, 50, 500, 200, 50, 100, 150, 150,
            150, 50, 25, 150, 175, 150, 150, 25, 200, 250, 250,
            250, 25, 500, 250, 275, 350, 350, 25, 400, 400, 400,
            25, 200, 250, 300, 300
        ];

        $sum = 0;
        foreach($request->claims as $claim)
            $sum += $points[$claim];

        $instructor = $request->instructor === null ? "Unknown" : $request->instructor;
        $claim = Auth::user()->claims()->create([
            'date' => $request->date,
            'instructor' => $instructor,
            'claims' => collect($request->claims)->implode(','),
            'points' => $sum,
            'remarks' => $request->remarks,
        ]);

        return redirect()->route('dashboard')->with('status', 'submitted');
    }
}

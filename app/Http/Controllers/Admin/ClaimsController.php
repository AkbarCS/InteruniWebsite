<?php

namespace App\Http\Controllers\Admin;

use App\Claim;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ClaimsController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     *
     * @param Claim $claim
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function edit(Claim $claim)
    {
        return view('manage.claims.edit')->with(compact('claim'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param Claim $claim
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function update(Request $request, Claim $claim)
    {
        $this->validate($request, [
            'status' => 'required|in:approved,rejected'
        ]);

        $claim->status = $request->status;
        $claim->save();

        return redirect()->route('admin.index');
    }
}
<?php

namespace App\Http\Controllers\Admin;

use Storage;
use App\Flight;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FlightsController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     *
     * @param Flight $flight
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function edit(Flight $flight)
    {
        return view('manage.flights.edit')->with(compact('flight'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param Flight $flight
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function update(Request $request, $id)
    {
		$flight = flight::findOrFail($id);
		
		if($flight->type == 'soaring')
			{
			if ($flight->status == 'processed')
				{
				$flight->points = $request->input('points');
				
				//edit existing json file
				$filename = str_replace('flightlogs', 'flightresults', $flight->filename);
				$flightdata = json_decode(Storage::get($filename));
				
				$flightscores = [
				'type' => 'soaring',
				'duration' => $flightdata->duration,
				'gain' => $flightdata->gain,
				'timepoints' => $request->input('timepoints'),
				'heightpoints' => $request->input('heightpoints'),
				];
							
				Storage::disk('local')->put($filename, json_encode($flightscores));

				$flight->save();
				}
			else if ($flight->status == 'parsed')
				{
				$flight->points = $request->input('points');
	
				//create new json file
				$flightscores = [
				'type' => 'soaring',
				'duration' => $request->input('points'),
				'gain' => $request->input('gain'),
				'timepoints' => $request->input('timepoints'),
				'heightpoints' => $request->input('heightpoints'),
				];
				
				$filename = str_replace('flightlogs', 'flightresults', $flight->filename);
				Storage::disk('local')->put($filename, json_encode($flightscores));
				
				$flight->status = 'processed';
				$flight->save();							
				}
			}
		else if($flight->type == 'crosscountry')
			{			
			//add data to json file
			if ($flight->status == 'processed')
				{
				$flight->points = $request->input('points');
				
				//edit existing json file
				$filename = str_replace('flightlogs', 'flightresults', $flight->filename);
				$flightdata = json_decode(Storage::get($filename));
				
				$flightscores = [
				'type' => 'crosscountry',
				'distancePoints' => $request->input('distancePoints'),
				'speedPoints' => $request->input('speedPoints'),
				'completionBonusPoints' => $request->input('completionBonusPoints'),
				];

				Storage::disk('local')->put($filename, json_encode($flightscores));	
				
				$flight->save();		
				}
			else if ($flight->status == 'parsed')
				{
				$flight->points = $request->input('points');
	
				//create new json file
				$flightscores = [
				'type' => 'crosscountry',
				'distancePoints' => $request->input('distancePoints'),
				'speedPoints' => $request->input('speedPoints'),
				'completionBonusPoints' => $request->input('completionBonusPoints'),
				];
				
				$filename = str_replace('flightlogs', 'flightresults', $flight->filename);
				Storage::disk('local')->put($filename, json_encode($flightscores));
				
				$flight->status = 'processed';
				$flight->save();		
				}
			}
			
		if (isset($_POST['downloadIGCFile'])) 
			{
			$filename = $flight->filename;
			return response()->download(storage_path("app/{$filename}"));
			}

        return redirect()->route('admin.index');
    }
	
	//create function here to scale scores if anyone scores more than 1,000 points for a given day. 
	//in this situation, all scores on that day will be scaled such that the maximum scored by 
	//anyone is 1,000 points -> only applies to crosscountry flights
/*	private function scaleScores()
	{
		
			
	}	*/
}
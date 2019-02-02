<?php

namespace App\Jobs;

use Storage;
use App\Flight;
use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Theomessin\IGCParser\Repository\Parser;
use Illuminate\Foundation\Bus\Dispatchable;

class ScoreFlight implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $flight;
    protected $fixes;
    protected $breakAltitude;

    /**
     * Create a new job instance.
     *
     * @param Flight $flight
     */
    public function __construct(Flight $flight)
    {
        $this->flight = $flight;
    }

    public function handle(Parser $parser) {
    /*    if ($this->flight->type == 'soaring')
            $this->handleSoaring($parser);	*/
	/*	else if ($this->flight->type == 'crosscountry')
            $this->handleCrossCountry($parser);	*/
    }
	
	/**
     * Execute the cross country scoring job.
     *
     * @param Parser $parser
     * @return void
     */
	 
/*	 public function handleCrossCountry($parser)
	 {
	 $xcPoints = $distancePoints + $speedPoints + $completionBonus;	
	 
	 
	 
	 $this->flight->points = max(0, $xcPoints);
     $this->flight->status = 'processed';
     $this->flight->save();
	 }	*/
	 

    /**
     * Execute the soaring job.
     *
     * @param Parser $parser
     * @return void
     */
    public function handleSoaring(Parser $parser)
    {
        $this->fixes = $parser->load($this->flight->filename)->getFixes();
        $flightStartFix = $this->findStartingFix();
        $flightEndFix = $this->findEndingFix();

        // Get Time Points
        $start = Carbon::createFromFormat('H:i:s', $this->fixes[$flightStartFix]->time);
        $end = Carbon::createFromFormat('H:i:s', $this->fixes[$flightEndFix]->time);
        $duration = $start->diffInMinutes($end);

        // Get Logger Clock
        $a = Carbon::createFromFormat('H:i:s', $this->fixes[$flightStartFix]->time);
        $b = Carbon::createFromFormat('H:i:s', $this->fixes[$flightStartFix + 5]->time);
        $clock = $a->diffInSeconds($b) / 5;

        $totalHeightGain = 0;
        // Get Height Gain Points
        $from = 0;
        $to = 0;
        $bottom = 0;
        $top = 0;
        $climbing = false;
        $intLastPointAltitude = $this->fixes[$flightStartFix]->altitude;
        for ($i = $flightStartFix; $i <= $flightEndFix; $i++) {
            $intThisPointAltitude = $this->fixes[$i]->altitude;
            $intAltitude30SecsAgo = $this->fixes[min($flightEndFix, $i - (300 / $clock))]->altitude;

            if ($intThisPointAltitude > $intLastPointAltitude) {
                if (!$climbing) {
                    $climbing = true;
                    $bottom = $intLastPointAltitude;
                    $from = Carbon::createFromFormat('H:i:s', $this->fixes[$i]->time);
                    $to = $from->copy()->addSecond(1);
                    $top = $intThisPointAltitude;
                } else if ($intThisPointAltitude > $top) {
                    $top = $intThisPointAltitude;
                    $to = Carbon::createFromFormat('H:i:s', $this->fixes[$i]->time);
                }
            } else if ($climbing && ($intThisPointAltitude < $intAltitude30SecsAgo)) {
                if (($top - $bottom) / $from->diffInSeconds($to) < 25) $totalHeightGain += ($top - $bottom);
                $climbing = false;
            }
            $intLastPointAltitude = $intThisPointAltitude;
        }

        $timepoints = $duration > 70 ? 70 - (($duration - 70) * 4) : $duration;
        $heightpoints = floor($totalHeightGain / 100) * 2;

        $flighscores = [
            'type' => 'soaring',
            'duration' => $duration,
            'gain' => ceil($totalHeightGain),
            'timepoints' => $timepoints,
            'heightpoints' => $heightpoints,
        ];

        $filename = str_replace('flightlogs', 'flightresults', $this->flight->filename);
        Storage::disk('local')->put($filename, json_encode($flighscores));

        $this->flight->points = max(0, $timepoints + $heightpoints);
        $this->flight->status = 'processed';
        $this->flight->save();
    }

    private function findStartingFix()
    {
        $derivative = 0;
        $previous = $this->fixes[0]->altitude;
        foreach ($this->fixes as $key => $fix) {
            if ($key === 0) continue;
            if ($fix->altitude - $previous >= 0) {
                if ($derivative < 0) $derivative = 0;
                $derivative++;
            } else {
                if ($derivative > 0) $derivative = 0;
                $derivative--;
            }
            if ($derivative < -3) return $key;
            $previous = $fix->altitude;
        }
    }

    private function findEndingFix() {
        for ($i = $this->fixes->count() - 1 ; $i >= 0 ; $i--)
            if ($this->fixes[$i]->altitude > $this->fixes[0]->altitude + 400)
                return $i;
    }
}

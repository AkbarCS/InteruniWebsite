<?php

namespace App\Jobs;

use Storage;
use App\Flight;
use \Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Theomessin\IGCParser\Repository\Parser;
use Illuminate\Foundation\Bus\Dispatchable;

class ParseFlight implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $flight;

    /**
     * Create a new job instance.
     *
     * @param Flight $flight
     */
    public function __construct(Flight $flight)
    {
        $this->flight = $flight;
    }

    /**
     * Execute the job.
     *
     * @param Parser $parser
     * @return void
     */
    public function handle(Parser $parser)
    {
        $flightlog = $parser->load($this->flight->filename);

        $flightdata = [
            'date' => $flightlog->getDate(),
            'type' => $flightlog->getGliderType(),
            'registration' => $flightlog->getGliderId(),
            'pilot' => $flightlog->getPilotInCommand(),
            'traces' => [
                'lateral' => $flightlog->getLateralTrace(),
                'vertical' => $flightlog->getVerticalTrace(),
            ]
        ];

        if (! Carbon::createFromFormat('Y-m-d', $flightdata['date'])->between(Carbon::createFromFormat('d/m/Y', '28/07/2018'), Carbon::createFromFormat('d/m/Y', '05/08/2018'))) {
            $this->flight->status = 'rejected';
            $this->flight->save();
            return;
        }

        $filename = str_replace('flightlogs', 'flightdata', $this->flight->filename);
        $filename = str_replace('igc', 'json', $filename);

        Storage::disk('local')->put($filename, json_encode($flightdata));

        $this->flight->status = 'parsed';
        $this->flight->save();

        dispatch((new ScoreFlight($this->flight))->delay(30));
    }
}

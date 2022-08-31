<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\AvailableAppointments;
use App\AllLocations;
use Illuminate\Support\Facades\Http;
class LogCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'log:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //
        \Log::info("Cron is working fine!");
        $response = Http::get('https://ttp.cbp.dhs.gov/schedulerapi/slots?orderBy=soonest&limit=3')->json();

        $AllLocations = Http::get('https://ttp.cbp.dhs.gov/schedulerapi/locations/')->json();
       // $data = json_decode($response->getBody()->getContents(), true);
       foreach ($response as $data) {

        AvailableAppointments::create([
            'locationId' => $data['locationId'],
            'startTimestamp' => $data['startTimestamp'],
            'endTimestamp' => $data['endTimestamp'],
            'active' => $data['active'],
            'duration' => $data['duration'],
            'remoteInd' => $data['remoteInd'],

        ]);
    }

    foreach ($AllLocations as $data) {

        AllLocations::create([
            'id' => $data['id'],
            'name' => $data['name'],
            'locationCode' => $data['locationCode'],
            'countryCode' => $data['countryCode'],
            'phoneNumber' => $data['phoneNumber'],


        ]);
    }

    }
}

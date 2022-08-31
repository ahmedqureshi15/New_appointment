<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\AvailableAppointments;
use Illuminate\Support\Facades\Http;



class AppointmentController extends Controller
{
    //
    function apicall(){

       // $client = new Client();
//$response = $client->get('https://ttp.cbp.dhs.gov/schedulerapi/slots?orderBy=soonest&limit=3');
$response = Http::get('https://ttp.cbp.dhs.gov/schedulerapi/slots?orderBy=soonest&limit=100')->json();


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
       var_dump($response);
      // echo 'abc';


    }
}

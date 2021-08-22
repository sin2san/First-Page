<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;

class HomeController extends Controller
{
    public function index()
    {
        $client = new Client();
        $url = "https://earthquake.usgs.gov/earthquakes/feed/v1.0/summary/all_day.geojson";

        $response = $client->request('GET', $url);

        $responseDecode = json_decode($response->getBody());

        $responseBody = $responseDecode->features;

        return view('datatable', compact('responseBody'));
    }
}

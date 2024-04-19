<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class EchangeController extends Controller
{

//    public function getExchanges()
//    {
//        $response = Http::get('https://api.coincap.io/v2/exchanges');
//
//        if ($response->successful()) {
//            $exchanges = $response->json()['data'];
//
//            return view('exchanges', compact('exchanges'));
//        } else {
//            // If the request fails, return an error message
//            return back()->with('error', 'Failed to retrieve exchange data.');
//        }
//    }

    public function getExchanges()
    {
        $response = Http::get('https://api.coincap.io/v2/exchanges');

        if ($response->successful()) {
            $exchanges = $response->json()['data'];

            return response()->json($exchanges);
        } else {
            return response()->json(['error' => 'Failed to retrieve exchange data.'], 500);
        }
    }


    public function show($id)
    {
        $response = Http::get("https://api.coincap.io/v2/exchanges/{$id}");

        if ($response->successful()) {
            $exchange = $response->json()['data'];

            return response()->json($exchange);
        } else {
            return response()->json(['error' => 'Failed to retrieve exchange details.'], 500);
        }
    }
}

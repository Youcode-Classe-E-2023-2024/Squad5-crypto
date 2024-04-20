<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MarketController extends Controller
{
    public function index() {
        $response = Http::get('https://api.coincap.io/v2/markets');


        if ($response->successful()) {
            $exchanges = $response->json()['data'];
            return response()->json($exchanges);
        } else {
            return response()->json(['error' => 'Failed to retrieve exchange data.'], 500);
        }
    }
}

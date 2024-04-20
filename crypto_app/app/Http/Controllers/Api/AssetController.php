<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Pagination\LengthAwarePaginator;

class AssetController extends Controller
{
//    public function index()
//    {
//        $response = Http::withoutVerifying()->get('https://api.coincap.io/v2/assets');
//
//        if ($response->ok()) {
//            return $response->json();
//        } else {
//            return response()->json(['message' => 'Une erreur est survenue lors de la récupération des actifs.'], $response->status());
//        }
//    }


    public function assets(Request $request)
    {
        $response = Http::withoutVerifying()->get('https://api.coincap.io/v2/assets');

        if ($response->ok()) {
            $assets = collect($response->json()['data']);

            $sortBy = $request->query('sort_by', 'name');
            $sortOrder = $request->query('sort_order', 'asc');

            if ($sortBy === 'name') {
                $assets = $assets->sortBy('name', SORT_NATURAL, $sortOrder === 'asc');
            } elseif ($sortBy === 'price') {
                $assets = $assets->sortBy('priceUsd', SORT_REGULAR, $sortOrder === 'asc');
            }

            return $assets->values()->all();
        } else {
            return response()->json(['message' => 'Une erreur est survenue lors de la récupération des actifs.'], $response->status());
        }
    }

    public function index()
    {
        return view('assetsPages.assets');
    }

}

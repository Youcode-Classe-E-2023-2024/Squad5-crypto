<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Pagination\LengthAwarePaginator;

class AssetController extends Controller
{
    public function index()
    {
        $response = Http::withoutVerifying()->get('https://api.coincap.io/v2/assets');

        if ($response->successful()) {
            $assets = $response->json()['data'];

            return response()->json($assets);
        } else {
            return response()->json(['error' => 'Failed to retrieve exchange data.'], 500);
        }
    }


//    public function index(Request $request)
//    {
//        // Récupérer les données des actifs depuis l'API
//        $response = Http::withoutVerifying()->get('https://api.coincap.io/v2/assets');
//
//        if ($response->ok()) {
//            $assets = collect($response->json()['data']);
//
//            $sortBy = $request->query('sort_by', 'name');
//            $sortOrder = $request->query('sort_order', 'asc');
//
//            if ($sortBy === 'name') {
//                $assets = $assets->sortBy('name', SORT_NATURAL, $sortOrder === 'asc');
//            } elseif ($sortBy === 'price') {
//                $assets = $assets->sortBy('priceUsd', SORT_REGULAR, $sortOrder === 'asc');
//            }
//
//            // Pagination par 10 avec LengthAwarePaginator
//            $currentPage = $request->query('page', 1);
//            $perPage = 10;
//            $pagedAssets = new LengthAwarePaginator(
//                $assets->forPage($currentPage, $perPage),
//                $assets->count(),
//                $perPage,
//                $currentPage,
//                ['path' => $request->url(), 'query' => $request->query()]
//            );
//
//            return $pagedAssets;
//        } else {
//            return response()->json(['message' => 'Une erreur est survenue lors de la récupération des actifs.'], $response->status());
//        }
//    }

}

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class QuoteController extends Controller
{
    public function getQuotes()
    {
        $quoteList = [];
        for ($i = 0; $i < 5; $i++) {
            $response = Http::get('https://api.kanye.rest');
            if ($response->status() == 200) {
                array_push($quoteList, $response->json('quote'));
            } else {
                return response()->json('Something wrong', $response->status());
            }
        }

        return response()->json($quoteList, 200);
    }
}

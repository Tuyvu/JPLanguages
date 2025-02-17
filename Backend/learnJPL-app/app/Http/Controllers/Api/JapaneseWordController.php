<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Http;

class JapaneseWordController extends Controller
{
    public function searchWord(Request $request)
    {
        $query = $request->input('word'); // Từ vựng cần tra
        $url = "https://jisho.org/api/v1/search/words?keyword=" . urlencode($query);

        $response = Http::get($url);
        return response()->json($response->json());
    }

    // Gọi API Tatoeba để lấy ví dụ câu
    public function exampleSentence(Request $request)
    {
        $query = $request->input('word');
        $url = "https://tatoeba.org/eng/api_v0/search?query=" . urlencode($query) . "&from=jpn&to=eng";

        $response = Http::get($url);
        return response()->json($response->json());
    }

    // Gọi API Kanji để lấy thông tin chữ Kanji
    public function kanjiDetail(Request $request)
    {
        $query = $request->input('kanji');
        $url = "https://kanjialive-api.p.rapidapi.com/api/public/kanji/$query";

        $response = Http::withHeaders([
            'X-RapidAPI-Host' => 'kanjialive-api.p.rapidapi.com',
            'X-RapidAPI-Key' => env('RAPIDAPI_KEY'), // Lưu key API trong file .env
        ])->get($url);

        return response()->json($response->json());
    }

}

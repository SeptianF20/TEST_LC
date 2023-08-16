<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use App\Models\Pencarian;
use App\Models\Favorit;

class SearchController extends Controller
{
    public function showSearchForm()
    {
        return view('contents.pencarian.pencarian');
    }

    public function search(Request $request)
    {
    $kata = $request->input('kata');

    $response = Http::get("https://api.dictionaryapi.dev/api/v2/entries/en/{$kata}");
    $data = $response->json();

    $pencarian = new Pencarian();
    $pencarian->user_id = Auth::user()->id;
    $pencarian->kata = $kata;
    $pencarian->makna = json_encode($data); // Ubah ke JSON untuk menyimpan dalam database
    $pencarian->save();

    return view('contents.pencarian.hasil_pencarian', compact('kata', 'data'));
    }


    public function markFavorite($kata)
    {
        $user = Auth::user();

        $pencarian = Pencarian::where('user_id', $user->id)->where('kata', $kata)->first();

        if ($pencarian) {
            $pencarian->favorited = true;
            $pencarian->save();
        }

        return back()->with('success', 'Kata berhasil ditandai sebagai favorit.');
    }

    public function showFavorites()
    {
        $user = Auth::user();
        $favorites = Pencarian::where('user_id', Auth::user()->id)->where('favorited', true)->orderBy('created_at', 'desc')->get();

        return view('contents.favorit.index', compact('favorites'));
    }

    public function showFavoriteMeaning($kata)
    {
    $response = Http::get("https://api.dictionaryapi.dev/api/v2/entries/en/{$kata}");
    $data = $response->json();

    return view('contents.pencarian.hasil_pencarian', compact('kata', 'data'));
    }

    public function showHistory()
    {
        $user = Auth::user();
        $history = Pencarian::where('user_id', $user->id)->orderBy('created_at', 'desc')->get();

        return view('contents.history.index', compact('history'));
    }

    public function showHistoryMeaning($kata)
    {
    $response = Http::get("https://api.dictionaryapi.dev/api/v2/entries/en/{$kata}");
    $data = $response->json();

    return view('contents.pencarian.hasil_pencarian', compact('kata', 'data'));
    }
}


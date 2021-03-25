<?php

namespace App\Http\Controllers;

use App\Models\Season;

class EpisodesController extends Controller
{
    public function index(int $seasonId)
    {
        $season = Season::find($seasonId);
        $episodes = $season->episodes;

        return view('episodes.index', compact('episodes'));
    }
}

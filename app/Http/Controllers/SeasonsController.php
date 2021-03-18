<?php

namespace App\Http\Controllers;

use App\Models\Serie;

class SeasonsController extends Controller
{
    public function index(int $serieId)
    {
        $seasons = Serie::find($serieId)->seasons;

        $pageTitle = 'Lista de Temporadas';
        $serieTitle = Serie::find($serieId)->title;

        return view('seasons.index', compact(
            'seasons',
            'pageTitle',
            'serieTitle',
        ));
    }
}

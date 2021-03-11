<?php

namespace App\Http\Controllers;

use App\Models\Serie;
use Illuminate\Http\Request;

class SeriesController extends Controller
{
    public function index()
    {
        $series = Serie::all();

        $pageTitle = 'Lista de Séries';

        return view('series/index', compact(
            'series',
            'pageTitle'
        ));
    }

    public function create()
    {
        $pageTitle = 'Nova Série';

        return view('series.create', compact(
            'pageTitle'
        ));
    }

    public function store(Request $request)
    {
        $title = $request->title;
        $releaseDate = $request->releaseDate;
        $endDate = $request->endDate;

        $serie = new Serie();

        $serie->title = $title;
        $serie->releaseDate = $releaseDate;
        $serie->endDate = $endDate;

        var_dump($serie->save());
    }
}

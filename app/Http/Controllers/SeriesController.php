<?php

namespace App\Http\Controllers;

class SeriesController extends Controller
{
    public function index()
    {
        $series = [
            'The Walking Dead',
            'La Casa de Papel',
            'The Walking Dead: World Beyond',
            'Fear The Walking Dead',
            'Dexter',
            'Breaking Bad',
            'Lost',
            'Anne with an E',
        ];

        $title = 'Lista de Séries';

        return view('series/index', compact(
            'series',
            'title'
        ));
    }

    // public function create()
    // {
    //     $title = 'Nova Série';

    //     return view('series.create', compact(
    //         'title'
    //     ));
    // }
}

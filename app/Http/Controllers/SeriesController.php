<?php

namespace App\Http\Controllers;

use App\Http\Middleware\FlashMessage;
use App\Models\Serie;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

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

    public function store(Request $request): Response
    {
        $title = $request->title;
        $releaseDate = $request->releaseDate;
        $endDate = $request->endDate;

        $serie = Serie::create([
            'title' => $title,
            'releaseDate' => $releaseDate,
            'endDate' => $endDate,
        ]);

        FlashMessage::setFlashMessage('success', "Série {$serie->title} foi criada com o ID #{$serie->id}", true);

        return new Response('', 302, [
            'Location' => '/series',
        ]);
    }
}

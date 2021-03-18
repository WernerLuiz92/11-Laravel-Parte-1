<?php

namespace App\Http\Controllers;

use App\Helpers\SeriesDestroy;
use App\Helpers\SeriesFactory;
use App\Http\Middleware\FlashMessage;
use App\Http\Requests\SeriesFormRequest;
use App\Models\Serie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class SeriesController extends Controller
{
    public function index()
    {
        $series = Serie::all();

        $pageTitle = 'Lista de Séries';

        $dir = __DIR__;

        return view('series.index', compact(
            'series',
            'pageTitle',
            'dir',
        ));
    }

    public function create()
    {
        $pageTitle = 'Nova Série';

        return view('series.create', compact('pageTitle'));
    }

    public function update()
    {
        $pageTitle = 'Alterar série';

        return view('series.create', compact('pageTitle'));
    }

    public function store(SeriesFormRequest $request, SeriesFactory $seriesFactory)
    {
        $title = $request->title;
        $releaseDate = $request->releaseDate;
        $endDate = $request->endDate;
        $qtdSeasons = $request->qtdSeasons;
        $qtdEpisodes = $request->qtdEpisodes;

        $serie = $seriesFactory->create($title, $releaseDate, $endDate, $qtdSeasons, $qtdEpisodes);

        FlashMessage::setFlashMessage('success', "Série {$serie->title} criada com sucesso!");

        return redirect()->route('series.index');
    }

    public function destroy(Request $request, SeriesDestroy $seriesDestroy)
    {
        $serieTitle = $seriesDestroy->delete($request->id);

        FlashMessage::setFlashMessage('danger', "Série $serieTitle foi removida com sucesso!");

        return redirect()->route('series.index');
    }
}

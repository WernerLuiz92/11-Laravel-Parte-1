<?php

namespace App\Http\Controllers;

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

    public function store(SeriesFormRequest $request)
    {
        $title = $request->title;
        $releaseDate = $request->releaseDate;
        $endDate = $request->endDate;

        $serie = Serie::create([
            'title' => $title,
            'releaseDate' => $releaseDate,
            'endDate' => $endDate,
        ]);

        $qtdSeasons = $request->qtdSeasons;
        for ($i = 1; $i <= $qtdSeasons; ++$i) {
            $season = $serie->seasons()->create(['number' => $i]);

            $qtdEpisodes = $request->qtdEpisodes;
            for ($j = 1; $j <= $qtdEpisodes; ++$j) {
                $season->espisodes()->create(['number' => $j]);
            }
        }

        FlashMessage::setFlashMessage('success', "Série {$serie->title}, temporadas e episódios foram criados com sucesso!");

        return redirect()->route('series.index');
    }

    public function destroy(Request $request)
    {
        Serie::destroy($request->id);

        FlashMessage::setFlashMessage('danger', 'Série foi removida com sucesso!');

        return redirect()->route('series.index');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Serie;
use Illuminate\Support\Facades\DB;

class SeasonsController extends Controller
{
    public function index(int $serieId)
    {
        $serie = Serie::find($serieId);
        $seasons = $serie->seasons;
        $pageTitle = 'Lista de Temporadas';
        $serieTitle = $serie->title;
        $qtyEpisodes = [];
        $seasonYear = [];
        $serieImgUrl = $serie->imageUrl;
        $serieSynopsis = $serie->synopsis;
        foreach ($seasons as $season) {
            $qtyEpisodes[$season->id] = $season->episodes->count();
            $seasonYear[$season->id] = date('Y', strtotime($season->releaseDate));
        }

        $serieLastEpisode = DB::table('series')
                            ->join('seasons', 'series.id', '=', 'seasons.serie_id')
                            ->join('episodes', 'seasons.id', '=', 'episodes.season_id')
                            ->select('episodes.releaseDate')
                            ->where('series.id', $serieId)
                            ->get();

        dd($serieLastEpisode);
        exit();

        $serieNextEpisode = DB::table('episodes')
                            ->where('releaseDate', '>', date('Y-m-d'))
                            ->min('releaseDate');

        return view('seasons.index', compact(
            'seasons',
            'pageTitle',
            'serieTitle',
            'seasonYear',
            'qtyEpisodes',
            'serieImgUrl',
            'serieSynopsis',
            'serieLastEpisode',
            'serieNextEpisode',
        ));
    }
}

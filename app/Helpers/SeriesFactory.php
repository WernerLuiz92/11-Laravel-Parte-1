<?php

namespace App\Helpers;

use App\Models\Season;
use App\Models\Serie;
use Illuminate\Support\Facades\DB;

class SeriesFactory
{
    public function create(string $title, string $releaseDate, $endDate, int $qtdSeasons, int $qtdEpisodes): Serie
    {
        DB::beginTransaction();

        $serie = Serie::create([
                'title' => $title,
                'releaseDate' => $releaseDate,
                'endDate' => $endDate,
            ]);

        $this->seasonCreate($serie, $qtdSeasons, $qtdEpisodes);

        DB::commit();

        return $serie;
    }

    private function seasonCreate(Serie $serie, int $qtdSeasons, int $qtdEpisodes): void
    {
        for ($i = 1; $i <= $qtdSeasons; ++$i) {
            $season = $serie->seasons()->create(['number' => $i]);
            $this->episodeCreate($season, $qtdEpisodes);
        }
    }

    private function episodeCreate(Season $season, int $qtdEpisodes): void
    {
        for ($j = 1; $j <= $qtdEpisodes; ++$j) {
            $season->episodes()->create(['number' => $j]);
        }
    }
}

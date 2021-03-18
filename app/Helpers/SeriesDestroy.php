<?php

namespace App\Helpers;

use App\Models\Episode;
use App\Models\Season;
use App\Models\Serie;
use Illuminate\Support\Facades\DB;

class SeriesDestroy
{
    public function delete(int $serieId): string
    {
        DB::beginTransaction();

        $serie = Serie::find($serieId);
        $serieTitle = $serie->title;

        $this->seasonDestroy($serie);
        $serie->delete();

        DB::commit();

        return $serieTitle;
    }

    private function seasonDestroy(Serie $serie): void
    {
        $serie->seasons->each(function (Season $season) {
            $this->episodeDestroy($season);
            $season->delete();
        });
    }

    private function episodeDestroy(Season $season): void
    {
        $season->episodes()->each(function (Episode $episode) {
            $episode->delete();
        });
    }
}

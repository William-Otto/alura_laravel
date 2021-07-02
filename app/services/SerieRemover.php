<?php

namespace App\Services;

use App\Models\Serie;
use App\Models\Season;
use App\Models\Episode;
use Illuminate\Support\Facades\DB;

class SerieRemover
{
    public function removeSerie(int $serieId):string
    {
        $serieName = '';

        DB::transaction(function () use ($serieId, &$serieName) {
            $serie = Serie::find($serieId);
            $serieName = $serie->name;

            $this->removeSerieAndSeasons($serie);
        });
   
        return $serieName;
    }
 
    public function removeSerieAndSeasons($serie):void
    {
        $serie->seasons->each(function (Season $season) {
            $season->episodes->each(function (Episode $episode) {
                $episode->delete();
            });
            $season->delete();
        });

        $serie->delete();
    }
}

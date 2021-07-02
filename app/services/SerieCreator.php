<?php 

namespace App\Services;

use App\Models\Serie;

class SerieCreator
{
  public function createSerie (string $serieName, int $seasons_number, int $ep_per_seasons) 
  {
    $serie = Serie::create(['name' => $serieName]);
    for ($i = 1; $i <= $seasons_number; $i++) {
        $season = $serie->seasons()->create(['number' => $i]);

        for ($j = 1; $j <= $ep_per_seasons; $j++) {
            $season->episodes()->create(['number' => $j]);
        }
    } 

    return $serie;
  }
}

?>
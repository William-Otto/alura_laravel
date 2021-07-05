<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Serie, Episode};
use App\Http\Controllers\{SeriesController, EpisodesController};

class SeasonsController extends Controller
{
    public function index (int $serieId)
    {
        $serie = Serie::find($serieId);
        $seasons = $serie->seasons;

        return view ('seasons.index', compact('seasons', 'serie'));
    }
}

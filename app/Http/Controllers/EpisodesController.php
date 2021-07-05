<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Season, Serie};
use App\Http\Controllers\{SeriesController, SeasonsController};

class EpisodesController extends Controller
{
    public function index (Season $season) 
    {
        $episodes = $season->episodes; 
        
        return view ('episodes.index', compact('episodes'));
    }
}

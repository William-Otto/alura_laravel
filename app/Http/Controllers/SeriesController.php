<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Serie;
use App\Http\Requests\SeriesFormRequest;
use App\services\SerieCreator;
use App\Models\Season;
use App\Models\Episode;

class SeriesController extends Controller
{
    public function index (Request $request) 
    {
        $series = Serie::query()->orderBy('name')->get();
        $message = $request->session()->get('message');
        
        return view('series.index', compact('series', 'message'));
    }

    public function create () 
    {
        return view ('series.create');
    }

    public function store (SeriesFormRequest $request, SerieCreator $serieCreator) 
    {   
        $serie = $serieCreator->createSerie($request->name, $request->seasons_number, $request->ep_per_seasons);

        $request->session()->flash('message', "Serie {$serie->name} with ID {$serie->id} and their seasons and episodes created successfully.");

        return redirect()->route('list_series');   
    } 

    public function destroy (Request $request)
    {
        $serie = Serie::find($request->id);
        $serie->seasons->each(function (Season $season) {
            $season->episodes->each(function (Episode $episode) {
                $episode->delete();
            });
            $season->delete();
        });
        $serie->delete();

        $request->session()->flash('message', "Serie deleted successfully.");

        return redirect()->route('list_series');
    }
 }

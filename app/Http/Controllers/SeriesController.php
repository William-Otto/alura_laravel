<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Serie, Season, Episode};
use App\Http\Requests\SeriesFormRequest;
use App\services\{SerieCreator, SerieRemover};

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

    public function destroy (Request $request, SerieRemover $serieRemover)
    {
        $serieName = $serieRemover->removeSerie($request->id);

        $request->session()->flash('message', "Serie deleted successfully.");

        return redirect()->route('list_series');
    }

    public function editName (int $id, Request $request) 
    {
        $newName = $request->name;
        $serie = Serie::find($id);
        $serie->name = $newName;
        $serie->save();
    }
 }

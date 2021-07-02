<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Serie;
use App\Http\Requests\SeriesFormRequest;

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

    public function store (SeriesFormRequest $request) 
    {   
        $serie = Serie::create(['name' => $request->name]);

        $seasons_number = $request->seasons_number;
        for ($i = 1; $i <= $seasons_number; $i++) {
            $season = $serie->seasons()->create(['number' => $i]);
            for ($j = 1; $j <= $request->seasons_number; $j++) {
                $season->episodes()->create(['number' => $j]);
            }
        } 

        $request->session()->flash('message', "Serie {$serie->name} with ID {$serie->id} and their seasons and episodes created successfully.");

        return redirect()->route('list_series');   
    } 

    public function destroy (Request $request)
    {
        $serie = Serie::destroy($request->id);

        $request->session()->flash('message', "Serie deleted successfully.");

        return redirect()->route('list_series');
    }
 }

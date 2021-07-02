<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Serie;

class SeriesController extends Controller
{
    public function index (Request $request) 
    {
        $series = Serie::all();
        
        return view('series.index', compact('series'));
    }

    public function create () 
    {
        return view ('series.create');
    }

    public function store (Request $request) 
    {
        $name = $request->name;
        $serie = Serie::create($request->all());

        echo "Série com o id {$serie->id} criada. Série {$serie->name}";
    } 
}

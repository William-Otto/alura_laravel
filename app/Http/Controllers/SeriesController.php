<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SeriesController extends Controller
{
    public function index (Request $request) 
    {
        $series = [
            'Invencible',
            'Game Of Thrones',
            'Tokyo Ghoul',
            'Naruto',            
        ];
        return view('series.index', compact('series'));
    }

    public function create () 
    {
        return view ('series.create');
    }

    public function store (Request $request) 
    {
        $name = $request->name;
        $serie = new Serie();
        $serie->name = $name;
    } 
}

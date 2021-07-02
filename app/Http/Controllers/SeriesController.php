<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SeriesController extends Controller
{
    public function index (Request $request) {
        $series = [
            'Invencible',
            'Game Of Thrones',
            'Tokyo Ghoul',
            'Naruto',            
        ];
    
        $html = "<ul>";
        foreach ($series as $serie) {
            $html .= "<li>$serie</li>";
        }
        $html .= "</ul>";
    
        return $html;
    }
}

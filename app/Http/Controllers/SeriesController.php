<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SeriesController extends Controller
{
    public function index(Request $request): string
    {
        $series = [
            'The Walking Dead',
            'Game of Thrones',
            'La Casa de Papel',
            'The Walking Dead: World Beyond',
            'Fear The Walking Dead',
            'Bones',
            'White Collar',
            'Dexter',
            'Breaking Bad',
            'Lost',
            'Anne with an E',
        ];

        $html = '<ul>';
        foreach ($series as $serie) {
            $html .= "<li>$serie.</li>";
        }
        $html .= '</ul>';

        return $html;
    }
}

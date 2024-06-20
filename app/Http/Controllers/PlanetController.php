<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PlanetController extends Controller
{
    private $planets = [
        'Mercury' => ['distance' => 57.9, 'price' => 50],
        'Venus' => ['distance' => 108.2, 'price' => 100],
        'Earth' => ['distance' => 149.6, 'price' => 200],
        'Mars' => ['distance' => 227.9, 'price' => 150],
        // Voeg hier meer planeten toe indien nodig
    ];

    public function index()
    {
        return response()->json($this->planets);
    }

    public function show($planet)
    {
        $planet = ucfirst($planet);

        if (array_key_exists($planet, $this->planets)) {
            return response()->json([
                'name' => $planet,
                'details' => $this->planets[$planet]
            ]);
        } else {
            return response()->json(['message' => 'Planet not found.'], 404);
        }
    }
}

<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('planeten', function (Request $request) {
    // Voorbeeld array van planeten met enkele eigenschappen
    $planets = [
        ['name' => 'Mercury', 'distance' => 57.9, 'price' => 50],
        ['name' => 'Venus', 'distance' => 108.2, 'price' => 100],
        ['name' => 'Earth', 'distance' => 149.6, 'price' => 200],
        ['name' => 'Mars', 'distance' => 227.9, 'price' => 150],
        // Voeg hier meer planeten toe indien nodig
    ];

    // Converteer array naar collectie
    $collection = collect($planets);

    // Controleer of de url parameter 'planet' bestaat
    if ($request->has('planet')) {
        $planet = ucfirst($request->input('planet')); // Maak eerste letter hoofdletter
        $filtered = $collection->where('name', $planet);

        // Indien filter resultaat leeg is, geef een boodschap terug
        if ($filtered->isEmpty()) {
            return response()->json(['message' => 'Planet not found.']);
        }

        return response()->json($filtered->values()->all());
    }

    // Als de parameter 'planet' niet is opgegeven, geef alle planeten terug
    return response()->json($collection->all());
});


Route::get('/greeting', function () {
    return ["foo" => "bar"];
});
Route::get('/', function () {
    return view('welcome');
});
// Route::get('/planeten', function () {
//     $planeten = ["Uranus", "Jupiter", "Mars", "Aarde", "Saturnus", "pluto", "Neptunus", "Venus"];
    
//     $planeten = [
//         [
//             'name' => 'Mars',
//             'description' => 'Mars is the fourth planet from the Sun and the second-smallest planet in the Solar System, being larger than only Mercury.'
//         ],
//         [
//             'name' => 'Venus',
//             'description' => 'Venus is the second planet from the Sun. It is named after the Roman goddess of love and beauty.'
//         ],
//         [
//             'name' => 'Earth',
//             'description' => 'Our home planet is the third planet from the Sun, and the only place we know of so far thats inhabited by living things.'
//         ],
//         [
//             'name' => 'Jupiter',
//             'description' => 'Jupiter is a gas giant and doesn\'t have a solid surface, but it may have a solid inner core about the size of Earth.'
//         ],
//     ];


//     return response()->json($planeten);
// });

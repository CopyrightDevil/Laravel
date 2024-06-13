<?php

use Illuminate\Support\Facades\Route;

Route::get('/greeting', function () {
    return ["foo" => "bar"];
});
Route::get('/', function () {
    return view('welcome');
});
Route::get('/planeten', function () {
    $planeten = ["Uranus", "Jupiter", "Mars", "Aarde", "Saturnus", "pluto", "Neptunus", "Venus"];
    
    $planeten = [
        [
            'name' => 'Mars',
            'description' => 'Mars is the fourth planet from the Sun and the second-smallest planet in the Solar System, being larger than only Mercury.'
        ],
        [
            'name' => 'Venus',
            'description' => 'Venus is the second planet from the Sun. It is named after the Roman goddess of love and beauty.'
        ],
        [
            'name' => 'Earth',
            'description' => 'Our home planet is the third planet from the Sun, and the only place we know of so far thats inhabited by living things.'
        ],
        [
            'name' => 'Jupiter',
            'description' => 'Jupiter is a gas giant and doesn\'t have a solid surface, but it may have a solid inner core about the size of Earth.'
        ],
    ];


    return response()->json($planeten);
});

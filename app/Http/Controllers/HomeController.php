<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Car;
use App\Pilot;

class HomeController extends Controller
{   
    // HOME
    public function home()
    {
        // $cars = Car::all();
        $cars = Car::where('deleted', false) -> get();
        //dd($cars);

        return view('home', compact('cars'));
    }

    // SINGOLO PILOTA
    public function pilot($id)
    {
        $pilots = Pilot::findOrFail($id);
        //dd($pilots);

        return view('pages.pilot', compact('pilots'));
    }
}

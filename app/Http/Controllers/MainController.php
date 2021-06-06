<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Brand;
use App\Car;
use App\Pilot;

class MainController extends Controller
{

   public function __construct()
   {
      $this->middleware('auth');
   }

   // CREA SINGOLA MACCHINA
   public function create()
   {
      $brands = Brand::all();

      $pilots = Pilot::all();
      //dd($brands);

      return view('pages.create', compact('brands', 'pilots'));
   }

   // ---------------------------------

   public function store(Request $request)
   {
      // dd($request -> all());

      $validate = $request -> validate([
      'name' => 'required|string',
      'model' => 'required|string',
      'kw' => 'required|integer',
      ]);
      // dd($validate);

      $brand = Brand::findOrFail($request -> get('brand_id'));

      $car = Car::make($validate);

      // associo il brand e salvo
      $car -> brand() -> associate($brand);

      $car -> save();

      // associo i piloti e salvo nuovamente
      $car -> pilots() -> attach($request -> get('pilots_id'));

      $car -> save();

      //dd($brand);

      return redirect() -> route('home');
   }

   // EDIT CAR
   public function edit($id){
      $car = Car::findOrFail($id);
      $brands = Brand::all();
      $pilots = Pilot::all();

      return view('pages.edit', compact('car', 'brands','pilots'));
   }

   // ---------------------------------

   public function update(Request $request, $id) {

      // dd($request -> all(), $id);

      $validate = $request -> validate([
         'name' => 'required|string',
         'model' => 'required|string',
         'kw' => 'required|integer',
      ]);
      $car = Car::findOrFail($id);
      $car -> update($validate);

      $car -> brand() -> associate($request -> brand_id);
      $car -> save();

      $car -> pilots() -> sync($request -> pilots_id);

      return redirect() -> route('home');
      // return redirect() -> route('car', $car -> id);

   }

   // DELETE
   public function destroy($id) {
      $car = Car::findOrFail($id);

      $car -> deleted = true;

      $car -> save();
      // dd($cars);

      return redirect( ) -> route('home');
   }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dish;
use App\Models\Spiciness;
use App\Models\Allergen;
use PDF;

class MenuController extends Controller
{
    public function index(Request $request)
    {
        if($request->filled('search')){
            $dishes = Dish::search($request->search)->get();
        }else{
            $dishes = Dish::all();
        }
        return view('menu', compact("dishes"));
    }

    public function downloadPDF() {
        $dishes = Dish::all();
        $pdf = PDF::loadView('pdf', compact('dishes'));

        return $pdf->stream();
    }

    public function edit(Dish $dish) {
        $dishData = Dish::with('allergens', 'category')->find($dish->id);
        $spiciness = Spiciness::all();
        $allergens = Allergen::all();
        return view('menu-edit', compact("dish", "spiciness", "allergens", "dishData"));
    }

    public function update(Request $request, Dish $dish)
    {
        $dish->spiciness_id = $request->spiciness_id;
        $allergens = $request->input('allergens');
        $dish->allergens()->detach();
        foreach($allergens as $allergen)
        {
            $dish->allergens()->save(Allergen::find($allergen));
        }
        $dish->save();
        return redirect()->route('menu');
    }
}

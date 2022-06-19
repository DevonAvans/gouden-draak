<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dish;
use App\Models\Spiciness;
use App\Models\Allergen;
use App\Models\Category;
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
        $categories = Category::all();
        return view('menu', compact("dishes","categories"));
    }

    public function downloadPDF() {
        $dishes = Dish::all();
        $categories = Category::all();
        $pdf = PDF::loadView('pdf', compact('dishes', 'categories'));
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
        if($request->spiciness_id != 0){
            $dish->spiciness_id = $request->spiciness_id;
        }
        else{
            $dish->spiciness_id = null;
        }
        $allergens = $request->input('allergens');
        $dish->allergens()->detach();
        if(isset($allergens)){
            foreach($allergens as $allergen)
            {
                $dish->allergens()->save(Allergen::find($allergen));
            }
        }
        $dish->save();
        return redirect()->route('menu');
    }
}

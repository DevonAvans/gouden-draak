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
        $categories = Category::all();
        $spiciness = Spiciness::all();
        $allergens = Allergen::all();
        return view('menu-edit', compact("dish","categories", "spiciness", "allergens", "dishData"));
    }

    public function update(Request $request, Dish $dish)
    {
        $dish->menu_text = $request->menu_text;
        $dish->name = $request->name;
        $dish->description = $request->description;
        $dish->price = $request->price;
        $dish->category_id = $request->category_id;
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

    public function create(){
        $categories = Category::all();
        $spiciness = Spiciness::all();
        $allergens = Allergen::all();
        return view('menu-create', compact('categories','spiciness', 'allergens'));
    }

    public function store(Request $request){
        $d = new Dish;
        $d->menu_text = $request->menu_text;
        $d->name = $request->name;
        $d->description = $request->description;
        $d->price = $request->price;
        $d->category_id = $request->category_id;
        if($request->spiciness_id != 0){
            $d->spiciness_id = $request->spiciness_id;
        }
        else{
            $d->spiciness_id = null;
        }
        $d->save();
        $allergens = $request->input('allergens');
        if(isset($allergens)){
            foreach($allergens as $allergen)
            {
                $d->allergens()->save(Allergen::find($allergen));
            }
        }
        return redirect()->route('menu');
    }

    public function setFavorite(Dish $dish){
        if(isset($_COOKIE['favorite'])) {
            $favorite = json_decode($_COOKIE['favorite'], true);
            array_push($favorite, $dish->id);
        } else {
            $favorite = [$dish->id];
        }
        setcookie('favorite', json_encode($favorite), time() + (86400 * 30), "/");
        return redirect()->route('menu');
    }

    public function getFavorite(){
        if(isset($_COOKIE['favorite'])){
            $ids = json_decode($_COOKIE['favorite'], true);
            $dishes = Dish::whereIn('id', $ids )->get();
        }else{
            $dishes = [];
        }
        $categories = Category::all();
        return view('favorites', compact("dishes"));
    }
}

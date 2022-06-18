<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dish;

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
}

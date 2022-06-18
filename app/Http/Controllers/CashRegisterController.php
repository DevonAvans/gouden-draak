<?php

namespace App\Http\Controllers;

use App\Models\Dish;
use App\Models\Orders;
use Illuminate\Http\Request;

class CashRegisterController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        return view('cashregister.index');
    }

    public function ordersIndex()
    {
        $orders = Orders::with('dishesInOrder')->get();
        foreach ($orders as $order) {
            $order->total = 0;
            foreach ($order->dishesInOrder as $dish) {
                $order->total += $dish->pivot->price;
            }
        }
        return view('cashregister.order.index', compact('orders'));
    }

    public function orderCreate()
    {
        $d = Dish::orderBy('category_id')->get();
        $dishes = [];
        foreach ($d as $dish) {
            $dishes[$dish->category->name][] = $dish;
        }
        return view('cashregister.order.create', compact('dishes'));
    }
    
    public function orderEdit(Orders $order) {
        dd("Hier moet nog een view komen om een bestelling te kunnen wijzigen");
    }

    public function orderDelete(Orders $order) {
        $order->delete();
        return redirect()->route('cashregister.orders.index')->with('message', 'Order is successfully deleted')->with('status', 'success');
    }
}

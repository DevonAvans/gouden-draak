<?php

namespace App\Http\Controllers;

use App\Models\Dish;
use App\Models\Orders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class CashRegisterController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
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
        $cookie = $_COOKIE['order'] ?? null;
        $order = $cookie ? json_decode($cookie, true)['dishes'] : null;
        $total = 0;
        if ($order != null) {
            foreach ($order as $dish) {
                $total += $dish['price'];
            }
        }
        return view('cashregister.order.create', compact('dishes', 'order', 'total'));
    }

    public function orderEdit(Orders $order)
    {
        dd("Hier moet nog een view komen om een bestelling te kunnen wijzigen");
    }

    public function orderDelete(Orders $order)
    {
        $order->delete();
        return redirect()->route('cashregister.orders.index')->with('message', 'Order is successfully deleted')->with('status', 'success');
    }

    public function index()
    {
        $cookie =  $_COOKIE['order'] ?? null;
        $json = json_decode($cookie);
        return response()->json([
            'order' => $json,
        ]);
    }

    public function store(Request $request)
    {
        $dish = Dish::find($request->dish_id);
        $cookie = $_COOKIE['order'] ?? null;
        $json = json_decode($cookie, true);
        if (isset($json['dishes'][$dish->menu_text])) {
            $json['dishes'][$dish->menu_text]['amount']++;
        } else {
            $json['dishes'][$dish->menu_text] = [
                'id' => $dish->id,
                'name' => $dish->name,
                'menu_text' => $dish->menu_text,
                'price' => $dish->price,
                'category' => $dish->category->name,
                'amount' => 1,
            ];
        }
        setcookie('order', json_encode($json), time() + 3600, '/'); // 1 hour
        return redirect()->route('cashregister.order.create')->with('message', 'Order is successfully added')->with('status', 'success');
    }

    public function update(Request $request, Orders $order)
    {
        dd('x3x');
        // $order->dishes()->sync($request->dish_id, ['price' => $request->price]);
        // return response()->json(['message' => 'Order is successfully updated', 'status' => 'success']);
    }

    public function destroy(Orders $order)
    {
        dd('xx4x');
        // $order->delete();
        // return response()->json(['message' => 'Order is successfully deleted', 'status' => 'success']);
    }
}

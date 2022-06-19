<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderApiRequest;
use App\Models\Dish;
use App\Models\Orders;
use Illuminate\Http\Request;

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

    public function orderRead($id)
    {
        $order = Orders::with('dishesInOrder')->findOrFail($id);
        dd($order);
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
                // dd($dish);
                $total += $dish['price'] * $dish['amount'];
            }
        }
        return view('cashregister.order.create', compact('dishes', 'order', 'total'));
    }

    public function orderStore()
    {
        $cookie = $_COOKIE['order'] ?? null;
        $json = json_decode($cookie, true);
        $order = new Orders();
        $order->save();
        foreach ($json['dishes'] as $dish) {
            $order->dishesInOrder()->attach($dish['id'], [
                'amount' => $dish['amount'],
                'comment' => $dish['comment'] ?? '',
                'price' => $dish['price']
            ]);
        }
        $order->save();
        setcookie('order', null, time() - 3600, '/');
        return redirect()->route('cashregister.order.read', $order->id);
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
        return view('cashregister.index');
    }

    public function storeDish(Request $request)
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
                'comment' => $request->comment ?? ''
            ];
        }
        setcookie('order', json_encode($json), time() + 3600, '/'); // 1 hour
        return redirect()->route('cashregister.order.create')->with('message', 'Order is successfully added')->with('status', 'success');
    }

    public function deleteDish(Request $request)
    {
        $dish = Dish::find($request->dish_id);
        $cookie = $_COOKIE['order'] ?? null;
        $json = json_decode($cookie, true);
        if (isset($json['dishes'][$dish->menu_text])) {
            unset($json['dishes'][$dish->menu_text]);
            setcookie('order', json_encode($json), time() + 3600, '/'); // 1 hour
            return redirect()->route('cashregister.order.create')->with('message', 'Dish is successfully deleted')->with('status', 'success');
        }
        return redirect()->route('cashregister.order.create')->with('message', 'Something went wrong')->with('status', 'error');
    }

    public function delete()
    {
        setcookie('order', null, time() - 3600, '/');
        return redirect()->route('cashregister.order.create')->with('message', 'Order is successfully deleted')->with('status', 'success');
    }
}

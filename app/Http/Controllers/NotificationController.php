<?php

namespace App\Http\Controllers;

use App\Http\Middleware\RedirectIfAuthenticated;
use App\Models\Notification;
use App\Models\Table;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index(Request $request)
    {
        $notis = Notification::all();
        return view('cashregister.notifications.index', compact("notis"));
    }

    public function create(){
        $tables = Table::all();
        return view('notify', compact('tables'));
    }

    public function store(Request $request){
        $notification = new Notification;
        $notification->table_id = $request->table_id;
        $notification->time = now();
        $notification->save();
        return redirect()->route('notify');
    }
}

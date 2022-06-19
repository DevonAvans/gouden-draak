<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Table;
use App\Models\User;

class TableController extends Controller
{
    public function index(Request $request)
    {
        $tables = Table::all();
        return view('table-index', compact("tables"));
    }

    public function edit(Table $table) {
        $users = User::where('role_id', '=', '3')->get();
        return view('table-edit', compact("table", "users"));
    }

    public function update(Request $request, Table $table)
    {
        $table->user_id = $request->user_id;
        $table->save();
        return redirect()->route('table.index');
    }

    public function clear(){
        $tables = Table::all();
        foreach($tables as $table){
            $table->user_id = null;
            $table->save();
        }
        return redirect()->back();
    }
}

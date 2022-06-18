<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
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
        return view('admin.index');
    }

    public function users()
    {
        $users = User::all();
        return view('admin.users', compact('users'));
    }

    public function userEdit(User $user)
    {
        $roles = Role::all();
        return view('admin.user-edit', compact('user', 'roles'));
    }
    
    public function userUpdate(Request $request, User $user)
    {
        $user->update($request->all());
        return redirect()->route('admin.users.index');
    }
}

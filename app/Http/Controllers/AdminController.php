<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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

    public function userCreate() {
        $method = 'POST';
        $roles = Role::where('name', '!=', 'admin')->get();
        return view('admin.user', compact('roles', 'method'));
    }

    public function userStore(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('admin.users.index');
    }

    public function userEdit(User $user)
    {
        $method = 'PUT';
        $roles = Role::where('name', '!=', 'admin')->get();
        return view('admin.user', compact('user', 'roles', 'method'));
    }
    
    public function userUpdate(Request $request, User $user)
    {
        $user->update($request->all());
        return redirect()->route('admin.users.index');
    }

    public function userDelete(User $user)
    {
        if ($user->role_id == 1) {
            return redirect()->route('admin.users.index')->with('message', 'Admin users cannot be deleted')->with('status', 'error');
        }
        $user->delete();
        return redirect()->route('admin.users.index')->with('message', 'User is successfully deleted')->with('status', 'success');
    }
}

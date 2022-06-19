<?php

namespace App\Http\Middleware;

use App\Models\Role;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $roles = array_slice(func_get_args(), 2);
        if (Auth::check()) {
            $user = Auth::user();
            $rolesDB = Role::all();
            foreach ($roles as $r) {
                foreach ($rolesDB as $role) {
                    if ($r == $role->name && $user->role_id == $role->id) {
                        return $next($request);
                    }
                }
            }
        }
        abort(401, 'This action is unauthorized.');
    }
}

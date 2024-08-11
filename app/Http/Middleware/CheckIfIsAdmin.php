<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckIfIsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::user()->isAdmin()) {
            return $next($request);
        }

        $admin = User::find($request->id)->isAdmin();

        if(!Auth::user()->isAdmin() && $admin) {
            return redirect()->route('users.index')->with('message', 'Um admin só poder ser deletado por outro admin');
        }

        return redirect()->route('home');
    }
}

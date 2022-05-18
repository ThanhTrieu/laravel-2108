<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class TestUserLogin
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
        $sessionUser = $request->session()->get('user');
        if($sessionUser !== ''){
            return $next($request);
        }
        return redirect()->route('test.home',['name' => 'a', 'id' => 1]);
    }
}

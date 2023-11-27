<?php

namespace ToInvestCapital\Http\Middleware;

use Closure;

class IsAdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
      $response = $next($request);
      $user = session('user');
      if( !empty($user) && $user->is_admin){
        return $response;
      }else {
        return redirect('/');
      }
    }
}

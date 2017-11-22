<?php

namespace Mascotas\Http\Middleware;

use Closure;
use Session;

class CheckAge
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $age)
    {
        
        if ($request->user()->Age() <= $age) {
            //abort(403,"No tienes la edad suficiente ");
            Session::flash('generalmsg','Usted es menor. Edad : '.$request->user()->Age());
            return redirect('home');
        }

        return $next($request);
    }


    
}

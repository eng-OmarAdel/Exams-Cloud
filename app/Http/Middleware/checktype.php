<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class checktype
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

       
          if(Auth::check())  {            
             $type=Auth::user()->type;
          }else{
             $type=0;
          }
          if($type == 1){
          }else{
            return redirect('');
          }
        return $next($request);
    }
}

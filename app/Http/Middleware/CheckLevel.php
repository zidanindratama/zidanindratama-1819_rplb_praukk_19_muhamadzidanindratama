<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\User;

class CheckLevel
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $privilege)
    {
        
        if($privilege == 'Administrator' && auth()->user()->role == 'Administrator'){
            return $next($request);
        }else if($privilege == 'Pelanggan' && auth()->user()->role == 'Pelanggan'){       
            return $next($request);
        }else if($privilege == 'Owner' && auth()->user()->role == 'Owner'){       
            return $next($request);
        }else if($privilege == 'Kasir' && auth()->user()->role == 'Kasir'){       
            return $next($request);
        }else if($privilege == 'Waiter' && auth()->user()->role == 'Waiter'){       
            return $next($request);
        }else if($privilege == "Administrator&Pelanggan"){
            if(auth()->user()->role == 'Administrator'){
                  return $next($request);
             }else if(auth()->user()->role == 'Pelanggan'){
                  return $next($request);
             }
        }else if($privilege == "Administrator&Owner"){
            if(auth()->user()->role == 'Administrator'){
                  return $next($request);
             }else if(auth()->user()->role == 'Owner'){
                  return $next($request);
             }
        }else if($privilege == "Administrator&Pelanggan"){
            if(auth()->user()->role == 'Administrator'){
                  return $next($request);
             }else if(auth()->user()->role == 'Pelanggan'){
                  return $next($request);
             }
        }else if($privilege == "Administrator&Kasir"){
            if(auth()->user()->role == 'Administrator'){
                  return $next($request);
             }else if(auth()->user()->role == 'Kasir'){
                  return $next($request);
             }
        }else if($privilege == "Administrator&Waiter"){
            if(auth()->user()->role == 'Administrator'){
                  return $next($request);
             }else if(auth()->user()->role == 'Waiter'){
                  return $next($request);
             }
        }else if($privilege == "Administrator&Kasir&Waiter"){
            if(auth()->user()->role == 'Administrator'){
                  return $next($request);
             }else if(auth()->user()->role == 'Kasir'){
                  return $next($request);
             }else if(auth()->user()->role == 'Waiter'){
                return $next($request);
           }
        }else if($privilege == "Administrator&Pelanggan&Owner"){
            if(auth()->user()->role == 'Administrator'){
                  return $next($request);
             }else if(auth()->user()->role == 'Pelanggan'){
                  return $next($request);
             }else if(auth()->user()->role == 'Owner'){
                return $next($request);
           }
        }else if($privilege == "Administrator&Pelanggan&Owner&Kasir"){
               if(auth()->user()->role == 'Administrator'){
                    return $next($request);
               }else if(auth()->user()->role == 'Pelanggan'){
                    return $next($request);
               }else if(auth()->user()->role == 'Owner'){
                    return $next($request);
               }else if(auth()->user()->role == 'Kasir'){
                    return $next($request);
               }
        }else if($privilege == "Administrator&Kasir&Waiter&Owner"){
            if(auth()->user()->role == 'Administrator'){
                  return $next($request);
             }else if(auth()->user()->role == 'Kasir'){
                  return $next($request);
             }else if(auth()->user()->role == 'Waiter'){
                return $next($request);
            }else if(auth()->user()->role == 'Owner'){
                return $next($request);
            }
        }
          
        return back();
    }
}
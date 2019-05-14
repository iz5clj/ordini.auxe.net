<?php

namespace App\Http\Middleware;

use Closure;
use App\User;

class CheckUserOne
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
        // 1. check if user 1 exists
        // Attention: if user 1 is deleted from the database, the users table must be migrated again, 
        // since the first id will be superior to 1 next time.

        if ( !$user = User::find(1) ) {
            if( $request->path() != 'install') {
                return redirect()->route('create-super-admin');
            } else {
                return $next($request);        
            }
            
        } elseif( $request->path() == 'install') {
            // Maybe send an email to advice that somebody is trying to run install!!
            return redirect('/');
        }

        return $next($request);
    }
}


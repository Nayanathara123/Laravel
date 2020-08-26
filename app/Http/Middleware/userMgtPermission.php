<?php

namespace App\Http\Middleware;

use Closure;
use App\Http\Requests;
use App\user;

class userMgtPermission
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
        $current_user = $request->session()->get('user_name');
        $user_details = user::all()->where('user_name', $current_user)->where('status',1);

        foreach($user_details as $user){

            if($user['user_role']==1){

                return $next($request);
            }
            else{
                return redirect('/display_access_denied');
            }

        }

        
    }
}


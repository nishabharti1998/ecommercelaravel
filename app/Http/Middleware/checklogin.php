<?php

namespace App\Http\Middleware;

use Closure;
use DB;
class checklogin
{
    
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $reques
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $token=$request->header('X-Auth-Token');
        $gettoken=DB::table('token')->where('token',$token)->get()->count();
        if($gettoken==0)
            {
            $status=401;
            return response()->json(array("mssg"=>"Unauthorized","status"=>$status));
            }
            return $next($request);
    }
}

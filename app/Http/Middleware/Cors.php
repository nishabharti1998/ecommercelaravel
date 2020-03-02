<?php

namespace App\Http\Middleware;

use Closure;

class Cors
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
        
        $trusted_domains = ["http://localhost:4200", "http://127.0.0.1:4200", "http://localhost:3000", "http://127.0.0.1:3000"];
    if (isset($request->server()['HTTP_ORIGIN'])) {
        $origin = $request->server()['HTTP_ORIGIN'];

        if (in_array($origin, $trusted_domains)) {
            header('Access-Control-Allow-Origin: ' . $origin);
            header('Access-Control-Allow-Headers: Origin, Content-Type, Authorization,X-Requested-with, X-Auth-Token,x-xsrf-token');
            header('Access-Control-Allow-Methods', 'POST, GET, OPTIONS, PUT, DELETE');
        }
    }
        return $next($request);
    }
}

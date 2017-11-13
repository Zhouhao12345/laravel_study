<?php

namespace App\Http\Middleware;

use Closure;

class CheckRoute2
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
        if ($request->route()->named('re3') or
            $request->route()->named('re4') or
            $request->route()->named('re5')) {
            return redirect()->to('https://www.aliyun.com');
        }
        return $next($request);
    }
}

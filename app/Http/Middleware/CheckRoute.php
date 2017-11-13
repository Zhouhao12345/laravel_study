<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Foundation\Console\Presets\None;

class CheckRoute
{
    /**
     * Handle an incoming request.
     * Donot forget register middleware in app/Http/Kernel.php
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($request->route()->named('profile'))
        {
            return redirect()->to('https://www.baidu.com');
        }
        return $next($request);
    }

    //This method would start to work on sth after customer response
    // had been sent to the browser
    public function terminate($request, $response)
    {
        //For example: store session in backend
    }
}

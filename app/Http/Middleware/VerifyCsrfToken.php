<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    // Specific urls without csrf token check
//    protected $except = [
//        //
//        'alipay/*',
//    ];

    /**
     * Save csrf in cookie, no need to add hidden in each input tag
     * @param \Illuminate\Http\Request $request
     * @param Closure $next
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle($request, Closure $next)
    {
        return parent::addCookieToResponse($request, $next($request));
    }
}

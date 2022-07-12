<?php

namespace App\Http\Middleware;

use Closure;

class LanguageCheck
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
        $header = $request->header('Accept-Language');
        app()->setLocale( $header );
        return $next($request);
    }
}

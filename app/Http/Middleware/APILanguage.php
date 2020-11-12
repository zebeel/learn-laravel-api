<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class APILanguage
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $lang =  $request->server('HTTP_CONTENT_LANGUAGE') ? $request->server('HTTP_CONTENT_LANGUAGE') : 'en';
        App::setLocale($lang);

        return $next($request);
    }
}

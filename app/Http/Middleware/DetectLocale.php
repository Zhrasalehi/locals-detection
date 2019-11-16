<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class DetectLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  Request  $request
     * @param  \Closure  $next
     * @param mixed ...$locales
     * @return mixed
     */
    public function handle($request, Closure $next, ...$locales)
    {
        $locales = $locales?: ['en'];

        if ($language = $request->getPreferredLanguage($locales)) {
            app()->setLocale($language);
        }

        return $next($request);
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Route;

class Localization
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
        // $request->route()->setParameter('locale', 'en');
        $locale = $request->route('locale');
        $route = Route::currentRouteName() ?? 'admin.login';
        if(!in_array($locale, ['en', "mm"])){
            return redirect()->route($route, app()->getLocale());
        }
        app()->setLocale($locale);
        return $next($request);
    }
}

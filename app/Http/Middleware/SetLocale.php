<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class SetLocale
{
    public function handle($request, Closure $next)
    {
        // Check session first
        if (Session::has('locale')) {
            App::setLocale(Session::get('locale'));
        }
        // Then check app config
        elseif ($fallback = config('app.fallback_locale')) {
            App::setLocale($fallback);
        }
        
        // Make locale available to all views
        view()->share('currentLocale', App::getLocale());
        
        return $next($request);
    }
}
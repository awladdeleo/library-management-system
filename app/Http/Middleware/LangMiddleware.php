<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class LangMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if( Request::capture()->expectsJson()){
            // Check header request and determine localizaton
            $local = ($request->hasHeader('x-lang')) ? $request->header('x-lang') : 'en';
            // set laravel localization
            app()->setLocale($local);

        }else{
            if(session()->has('lang_code')){
                App::setLocale(session()->get('lang_code'));
            }else{
                session()->put('lang_code','en');
                App::setLocale(session()->get('lang_code'));

            }
        }

        return $next($request);
    }
}

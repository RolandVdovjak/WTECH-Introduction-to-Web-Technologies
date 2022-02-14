<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class StripEmptyParams
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

    /** ZDROJ
     *https://stackoverflow.com/questions/42899166/laravel-5-4-how-to-exclude-empty-field-in-url-when-get-form
     */

    public function handle(Request $request, Closure $next)
    {
        $query = request()->query();
        $querycount = count($query);
        foreach ($query as $key => $value) {
            if ($value == '') {
                unset($query[$key]);
            }
        }
        if ($querycount > count($query)) {
            $path = url()->current() . (!empty($query) ? '?' . http_build_query($query) : '');
            return redirect()->to($path);
        }
        return $next($request);
    }

}

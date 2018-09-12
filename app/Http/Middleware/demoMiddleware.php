<?php
// cmd create a middleware: php artisan make:middleware demoMiddleware
namespace App\Http\Middleware;

use Closure;

class demoMiddleware
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
        // check whether variable $grade is available and greater tahn 3. Otherwise, redirect to 'fail' route
        if($request->has('grade') && $request['grade']>=5)
            return $next($request);
        else
            return redirect()->route('fail');
    }
}

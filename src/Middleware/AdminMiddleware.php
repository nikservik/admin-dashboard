<?php


namespace Nikservik\AdminDashboard\Middleware;


use Closure;

class AdminMiddleware
{
    public function handle($request, Closure $next)
    {
        if (! $request->user() || $request->user() && ! $request->user()->hasEditorRole()) {
            return redirect('/login')->withErrors([
                'email' => 'unauthorized',
            ]);
        }

        return $next($request);
    }
}

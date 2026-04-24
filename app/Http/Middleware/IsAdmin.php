<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // نتحقق أولاً هل المستخدم مسجل دخول، وهل هو أدمن
        if (auth()->check() && auth()->user()->is_admin) {
            return $next($request);
        }

        // إذا لم يكن أدمن، يتم منعه فوراً
        abort(403, 'You are not authorized to access this page.');
    }
}

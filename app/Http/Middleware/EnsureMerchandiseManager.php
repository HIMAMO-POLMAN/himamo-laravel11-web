<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureMerchandiseManager
{
    public function handle(Request $request, Closure $next): Response
    {
        if (! in_array($request->user()?->role, ['admin', 'ekraf'], true)) {
            abort(403);
        }

        return $next($request);
    }
}

<?php

use App\Http\Middleware\AuthCheck;
use App\Http\Middleware\EnsureMerchandiseManager;
use App\Http\Middleware\EnsureStaffOrAdmin;
use App\Http\Middleware\IsAdmin;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {

        $middleware->alias([
            'auth-check' => AuthCheck::class,
            'is-staff-or-admin' => EnsureStaffOrAdmin::class,
            'is-admin' => IsAdmin::class,
            'merchandise-manager' => EnsureMerchandiseManager::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();

<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->validateCsrfTokens(except: [
            '/',
            'admin',
            'inc/*',
            'admin/inc/*',
            'vcon/*',
            'soal.php',
            'tugas.php',
            'proses-tugas.php',
            'editor-upload.php',
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();

<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    // Middlewares globais
    protected $middleware = [
        // Exemplo de middleware padrão
        \Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode::class,
        // Adicione outros middlewares conforme necessário
    ];

    // Middlewares específicos de rotas
    protected $routeMiddleware = [
        // 'auth' => \App\Http\Middleware\Authenticate::class,
    ];
}

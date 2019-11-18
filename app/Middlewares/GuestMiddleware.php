<?php

namespace App\Middlewares;

use App\Classes\CustomerData\UserSession;
use MiladRahimi\PhpRouter\Middleware;
use Psr\Http\Message\ServerRequestInterface;

class GuestMiddleware implements Middleware
{
    use UserSession;

    public function handle(ServerRequestInterface $request, \Closure $next)
    {
        if (!$this->isLogged()) {
            return $next($request);
        }
        return header("Location: /contactos/listar");
    }
}
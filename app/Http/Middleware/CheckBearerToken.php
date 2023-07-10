<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckBearerToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next):Response
    {
        // Получение аутентификационного токена "Bearer" из заголовка запроса
        $bearerToken = $request->header('Authorization');
        
        // Проверка наличия токена и его формата (должен начинаться с "Bearer ")
        if (!$bearerToken || strpos($bearerToken, 'Bearer ') !== 0) {
            return response()->json(['message' => 'Необходимо предоставить аутентификационный токен'], 401);
        }
        
        return $next($request);
    }

}

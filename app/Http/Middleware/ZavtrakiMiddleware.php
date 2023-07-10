<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Carbon;

class ZavtrakiMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next):Response
    {
        $now = Carbon::now();
        $start = Carbon::createFromTime(10, 0, 0); // Время начала (10:00)
        $end = Carbon::createFromTime(12, 0, 0); // Время окончания (12:00)

        if ($now->between($start, $end)) { // Проверяем, находимся ли мы в диапазоне времени
            return $next($request); // Пользователь разрешен
        }

        return response()->json(['error' => 'Доступ запрещен.'], 403); // Пользователь запрещен
    }

}

<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class StatisticsEmployeeMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        return $next($request);

        $employee = auth('sanctum')->user();
        if(!$employee &&   ! $employee->isA('statistics-employee')){
            return response()->json(['message' => 'Unauthorized'], 403);
        }
         return $next($request);
    }
}
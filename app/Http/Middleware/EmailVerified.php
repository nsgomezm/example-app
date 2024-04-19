<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EmailVerified
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        if (! $request->user()->hasVerifiedEmail()) {
            return redirect( route('user.form') )->with('alert', [
                "type" => 'warning',
                "message" => "Por favor confirma tu correo!"
            ]);
        }

        return $next($request);
    }
}

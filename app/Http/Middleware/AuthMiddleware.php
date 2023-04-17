<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class AuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $uuid = $request->query->get('uuid');
        if ($uuid == null) {
            abort(401, 'uuid is required', []);
        } else {
            $user = DB::table('users')->where('uuid', '=', $uuid )->get();
            if ($user->count() > 0) {
                return $next($request);    
            } else {
                abort(401, "uuid is required", []);
            }
        }
    }
}

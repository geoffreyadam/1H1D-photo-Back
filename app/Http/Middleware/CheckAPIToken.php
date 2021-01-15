<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckAPIToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
      $requestData = $request->header();
      if (isset($requestData['token'][0]) && $requestData['token'][0] === Config('api.apiToken')) {
        return $next($request);
      } else {
        return response()->json(['error' => 'False API Token, contact an admin.']);
      }
    }
}

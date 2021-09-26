<?php

namespace App\Http\Middleware;

use Auth0\Login\Contract\Auth0UserRepository;
use Auth0\SDK\Exception\CoreException;
use Auth0\SDK\Exception\InvalidTokenException;
use Closure;
use Illuminate\Http\Request;

class Auth0_JWT
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
      $auth0 = \App::make('auth0');

      $accessToken = $request->bearerToken() ?? "";
      
      try {
        $tokenInfo = $auth0->decodeJWT($accessToken);
        $user = $this->userRepository->getUserByDecodedJWT($tokenInfo);
        if (!$user) {
          return response()->json(["message" => "Unauthorized user"], 401);
        }

      }

      catch (InvalidTokenException $e) {
        return response()->json(["message" => $e->getMessage()], 401);
      }

      catch (CoreException $e) {
        return response()->json(["message" => $e->getMessage()], 401);
      }

      return $next($request);
    }
}

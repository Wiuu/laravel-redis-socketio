<?php
/**
 * Created by PhpStorm.
 * User: wiuu
 * Date: 06/01/21
 * Time: 23:44
 */

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use App\Services\Log\LogService;
use Carbon\Carbon;
use Closure;
use Illuminate\Support\Facades\Log;



class SocketRequiredFields extends Middleware
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param Closure $next
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|mixed
     */
    public function handle($request, Closure $next)
    {
        if ($request->header('token') != env('INTERNAL_TOKEN')) {
            return response()->json(['data' => 'invalid token'], 401);
        } else {
            $params = $request->all();
            if (!array_key_exists('event', $params) || !array_key_exists('data', $params)) {
                return response()->json(['data' => 'required fields missing'], 401);
            }
        }

        return $next($request);
    }
}

<?php namespace App\Http\Middleware;

use Closure;
use Entrust;
use Route;
use Auth;

class UnauthorizedIfNotPermitted {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		if (Auth::user()->name == 'Supervisor') {
			return $next($request);
		}
		$full = Route::currentRouteAction();
		$tok = strtok($full, "\\");

		while ($tok != false) {
			$action = $tok;
			$tok = strtok("\\");
		}
		$action = str_replace('Controller@', '-', $action);

		if (Entrust::can($action)) {
			return $next($request);
		}
		abort(401);
	}

}

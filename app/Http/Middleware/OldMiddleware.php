<?php namespace App\Http\Middleware;

use Closure;

class OldMiddleware {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		
	    if ($request['age'] < 20) {
			return redirect(route("storeExit",$request['age']));
        }
        echo "<script>alert('판매완료')</script>";

		return $next($request);
	}



}

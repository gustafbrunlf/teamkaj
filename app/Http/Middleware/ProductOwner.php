<?php namespace App\Http\Middleware;

use Closure;
use App\Product;


class ProductOwner {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{	
	    $slug = $request->route('products');
	    $product = Product::where(['slug' => $slug])->firstOrFail();

	    if(\Auth::user() != $product->user) {
	        return redirect('products');
	    }

	    return $next($request);
	}

}

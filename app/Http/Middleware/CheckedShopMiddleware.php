<?php

namespace App\Http\Middleware;

use App\Models\Seller;
use Closure;

class CheckedShopMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $shop=Seller::find(auth()->id())->shop()->first();
        if (!$shop){
            return redirect()->route('seller.shop.create');
        }
        return $next($request);
    }
}

<?php

namespace App\Http\Middleware;

use App\constants\Constants;
use App\Models\Seller;
use Closure;

class CheckedSubscriptionMiddleware
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
        $seller=Seller::find(auth()->id());
        if ($seller->subscription==Constants::UNSUBSCRIBED){
            return redirect()->route('seller.subscription.index');
        }
        return $next($request);
    }
}

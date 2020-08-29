<?php

namespace FlashMessages\Http\Middleware;

use Closure;
use FlashMessages\FlashMessageContract;
use \Illuminate\Support\Facades\View;

class SeedFlashMessageViewFromSession
{
    public function handle($request, Closure $next, $guard = null)
    {
        /**
         * @var $flashMessage FlashMessageContract
         */
        $flashMessage = app()->make(FlashMessageContract::class);

        if ($flashMessage->hasMessage()) {
            View::composer('flash-message', $flashMessage->getMessage());
        }

        return $next($request);
    }
}

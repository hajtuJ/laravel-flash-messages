<?php

namespace FlashMessages\Http\Middleware;

use \Illuminate\Support\Facades\View;
use Closure;
use FlashMessages\FlashMessageContract;

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

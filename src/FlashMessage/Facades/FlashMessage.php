<?php

namespace FlashMessages\FlashMessage\Facades;

use Illuminate\Support\Facades\Facade;
use FlashMessages\FlashMessageContract;

class FlashMessage extends Facade
{

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return FlashMessageContract::class;
    }
}

<?php

namespace FlashMessages\FlashMessage\Facades;

use FlashMessages\FlashMessageContract;
use Illuminate\Support\Facades\Facade;

/**
 * Class FlashMessage.
 *
 * @method static string getMacroName(string $type);
 * @method static void flashMessage(string $type, string $text);
 * @method static bool  hasMessage();
 * @method static null|array getMessage();
 * @method static void forgetMessage();
 *
 * @see \FlashMessages\FlashMessage
 */
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

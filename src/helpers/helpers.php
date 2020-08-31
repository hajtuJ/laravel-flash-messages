<?php


if (!function_exists('flash')) {

    /**
     * Arrange for a flash message.
     *
     * @param string|null $message
     * @param string|null $type
     * @return \FlashMessages\FlashMessageContract
     */
    function flash($message = null, $type = null)
    {
        $flashMessage = app(\FlashMessages\FlashMessageContract::class);

        if (!is_null($message)) {
            return $flashMessage->flashMessage($message, $type);
        }

        return $flashMessage;
    }

}

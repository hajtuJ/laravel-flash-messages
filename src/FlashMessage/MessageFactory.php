<?php

namespace FlashMessages\FlashMessage;

/**
 * Class MessageFactory.
 */
class MessageFactory
{
    /**
     * @param string|null $type
     * @param string      $message
     *
     * @return Message
     */
    public function build(string $message, string $type = null)
    {
        return new Message($message, $type);
    }
}

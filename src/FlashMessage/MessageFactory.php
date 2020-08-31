<?php

namespace FlashMessages\FlashMessage;

use FlashMessages\FlashMessage\Traits\UseConfigTrait as WithConfig;

/**
 * Class MessageFactory.
 */
class MessageFactory
{
    use WithConfig;

    /**
     * @param string|null $type
     * @param string      $message
     *
     * @return Message
     */
    public function build(string $message, string $type = null)
    {
        return new Message($this->getConfig()['class'], $message, $type);
    }
}

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
     * @param array       $config
     * @param string|null $type
     * @param string      $message
     *
     * @return Message
     */
    public function build(array $config, string $message, string $type = null)
    {
        return new Message($config, $message, $type);
    }
}

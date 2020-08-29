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
     * @param string $type
     *
     * @return string
     */
    private function createClassName(string $type)
    {
        return $this->config['class']['prefix'].$type.$this->config['class']['suffix'];
    }

    /**
     * @param string $type
     * @param string $message
     *
     * @return Message
     */
    public function build(string $type, string $message)
    {
        return new Message($type, $message, $this->createClassName($type));
    }
}

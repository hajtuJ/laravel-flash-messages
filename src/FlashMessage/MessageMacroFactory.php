<?php


namespace FlashMessages\FlashMessage;

use FlashMessages\FlashMessage\Traits\UseConfigTrait as WithConfig;

/**
 * Class MessageMacro
 * @package FlashMessages\FlashMessage
 */
class MessageMacroFactory
{
    use WithConfig;

    public function getName(string $type): string
    {
        $config = $this->getConfig();

        return $config['macro']['prefix'] . $type . $config['macro']['suffix'];
    }
}

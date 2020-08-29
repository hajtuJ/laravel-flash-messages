<?php

namespace FlashMessages;

use FlashMessages\FlashMessage\Flasher;
use FlashMessages\FlashMessage\MessageFactory;
use FlashMessages\FlashMessage\MessageMacroFactory;
use FlashMessages\FlashMessage\Traits\UseConfigTrait as withConfig;

/**
 * Class FlashMessage.
 */
class FlashMessage implements FlashMessageContract
{
    use withConfig;

    /**
     * @return MessageFactory
     */
    private function getFactory(): MessageFactory
    {
        return new MessageFactory($this->getConfig());
    }

    /**
     * @param string $type
     * @param string $text
     *
     * @return FlashMessage\Message
     */
    private function makeMessage(string $type, string $text)
    {
        return $this->getFactory()->build($type, $text);
    }

    /**
     * @return Flasher
     */
    private function getFlasher()
    {
        return app(Flasher::class);
    }

    /**
     * @return MessageMacroFactory
     */
    private function getMessageMacroFactory(): MessageMacroFactory
    {
        return new MessageMacroFactory($this->getConfig());
    }

    /**
     * @param string $type
     *
     * @return string
     */
    public function getMacroName(string $type): string
    {
        return $this->getMessageMacroFactory()->getName($type);
    }

    /**
     * @param string $type
     * @param string $text
     */
    public function flashMessage(string $type, string $text)
    {
        $message = $this->makeMessage($type, $text);
        $this->getFlasher()->flash($message);
    }

    /**
     * @return bool
     */
    public function hasMessage(): bool
    {
        return $this->getFlasher()->exists();
    }

    /**
     * @return array|null
     */
    public function getMessage(): ?array
    {
        return $this->getFlasher()->get();
    }

    /**
     * @return void
     */
    public function forgetMessage(): void
    {
        $this->getFlasher()->forget();
    }
}

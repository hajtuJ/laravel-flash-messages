<?php

namespace FlashMessages;

use FlashMessages\FlashMessage\Flasher;
use FlashMessages\FlashMessage\Message;
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
     * @var Message
     */
    protected $message = null;

    /**
     * @return MessageFactory
     */
    private function getFactory(): MessageFactory
    {
        return new MessageFactory($this->getConfig());
    }

    /**
     * @param string|null $type
     * @param string      $message
     *
     * @return FlashMessage\Message
     */
    private function makeMessage(string $message, string $type = null)
    {
        return $this->getFactory()->build($message, $type);
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
     * @param string|null $type
     * @param string      $text
     *
     * @return $this
     */
    public function flashMessage(string $text, string $type = null)
    {
        $this->message = $this->makeMessage($text, $type);
        if ($this->message->flashAble()) {
            $this->getFlasher()->flash($this->message);
        }

        return $this;
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

    /**
     * @return bool
     */
    private function messageCreated(): bool
    {
        return !is_null($this->message) && $this->message instanceof Message;
    }

    /**
     * @param $type
     *
     * @return bool
     */
    private function messageTypeExists($type): bool
    {
        return in_array($type, $this->config['types']);
    }

    public function __call(string $name, array $arguments)
    {
        if ($this->messageCreated() && $this->messageTypeExists($name)) {
            $this->message->setType($name);
            $this->getFlasher()->flash($this->message);

            return $this;
        }
    }
}

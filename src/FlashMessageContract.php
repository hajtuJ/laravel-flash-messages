<?php

namespace FlashMessages;

/**
 * Class FlashMessage.
 */
interface FlashMessageContract
{
    const NAMESPACE = 'flash-message';

    /**
     * @param string $type
     *
     * @return string
     */
    public function getMacroName(string $type): string;

    /**
     * @param string|null $type
     * @param string $text
     */
    public function flashMessage(string $text, string $type = null);

    /**
     * @return bool
     */
    public function hasMessage(): bool;

    /**
     * @return array|null
     */
    public function getMessage(): ?array;

    /**
     * @return void
     */
    public function forgetMessage(): void;
}

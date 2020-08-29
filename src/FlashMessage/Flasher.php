<?php


namespace FlashMessages\FlashMessage;


use Illuminate\Contracts\Session\Session;

/**
 * Class Flasher
 * @package FlashMessages\FlashMessage
 */
class Flasher
{

    const KEY = 'flash-message';

    /**
     * @var Session $session
     */
    protected $session;

    /**
     * Flasher constructor.
     * @param Session $session
     */
    public function __construct(Session $session)
    {
        $this->setSession($session);
    }

    /**
     * @return mixed
     */
    public function getSession()
    {
        return $this->session;
    }

    /**
     * @param mixed $session
     */
    public function setSession($session): void
    {
        $this->session = $session;
    }

    /**
     * @param Message $message
     */
    private function flashMessage(Message $message)
    {
        $this->session->flash(self::KEY, $message->toArray());
    }

    /**
     * @param Message $message
     */
    public function flash(Message $message)
    {
        $this->flashMessage($message);
    }

    /**
     * @return bool
     */
    public function exists(): bool
    {
        return $this->getSession()->has(self::KEY);
    }

    /**
     * @return array|null
     */
    public function get():? array
    {
        return $this->getSession()->get(self::KEY);
    }

    /**
     * @return void
     */
    public function forget(): void
    {
        $this->getSession()->forget(self::KEY);
    }

}

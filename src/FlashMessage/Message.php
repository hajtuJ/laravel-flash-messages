<?php

namespace FlashMessages\FlashMessage;

use FlashMessages\FlashMessage\Traits\UseConfigTrait as withConfig;

class Message
{
    use withConfig;

    /**
     * @var string|null
     */
    protected $type = null;

    /**
     * @var string
     */
    protected $text = '';

    /**
     * @var string|null
     */
    protected $class = null;

    /**
     * @var array
     */
    protected $config;

    public function __construct(string $text, string $type = null)
    {
        $this->setText($text);
        if (!is_null($type)) {
            $this->setType($type);
        }
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType(string $type): void
    {
        $this->type = $type;
        $this->setClass($type);
    }

    /**
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }

    /**
     * @param string $text
     */
    public function setText(string $text): void
    {
        $this->text = $text;
    }

    /**
     * @return string
     */
    public function getClass(): string
    {
        return $this->class;
    }

    /**
     * @param string $class
     */
    public function setClass(string $class): void
    {
        $this->class = $this->createClassName($class);
    }

    /**
     * @param string|null $type
     *
     * @return string
     */
    private function createClassName(string $type = null)
    {
        $config = $this->getConfig();

        return $config['class']['prefix'].$type.$config['class']['suffix'];
    }

    public function flashAble(): bool
    {
        return !is_null($this->type);
    }

    public function toArray()
    {
        return [
            'type'  => $this->getType(),
            'class' => $this->getClass(),
            'text'  => $this->getText(),
        ];
    }
}

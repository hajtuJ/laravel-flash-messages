<?php

namespace FlashMessages\FlashMessage;

class Message
{

    /**
     * @var string
     */
    protected $type;

    /**
     * @var string
     */
    protected $text;

    /**
     * @var string
     *
     */
    protected $class;

    public function __construct(string $type, string $text, string $class)
    {
        $this->setType($type);
        $this->setText($text);
        $this->setClass($class);
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
        $this->class = $class;
    }


    public function toArray()
    {
        return [
            'type' => $this->getType(),
            'class' => $this->getClass(),
            'text' => $this->getText(),
        ];
    }
}

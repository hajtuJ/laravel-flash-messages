<?php

namespace FlashMessages\FlashMessage;

class Message
{
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

    public function __construct(array $config, string $text, string $type = null)
    {
        $this->setText($text);
        $this->setType($type);
        $this->setConfig($config);
    }

    /**
     * @return array
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * @param array $config
     */
    public function setConfig(array $config): void
    {
        $this->config = $config;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string|null $type
     */
    public function setType(string $type = null): void
    {
        if (!is_null($type)) {
            $this->type = $type;
            $this->setClass($type);
        }
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
        return $this->config['prefix'].$type.$this->config['suffix'];
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

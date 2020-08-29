<?php

namespace FlashMessages\FlashMessage\Traits;

trait UseConfigTrait
{

    /**
     * @var $config array
     */
    protected $config;

    /**
     * MessageMacro constructor.
     * @param array|null $config
     */
    public function __construct(array $config = null)
    {
        $this->setConfig($config);
    }

    /**
     * @return mixed
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * @param mixed $config
     */
    public function setConfig($config): void
    {
        $this->config = $config;
    }
}

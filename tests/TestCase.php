<?php

namespace FlashMessages\Tests;

use FlashMessages\FlashMessageContract;
use Orchestra\Testbench\TestCase as OrchestraTestCaste;

class TestCase extends OrchestraTestCaste
{
    protected function getPackageProviders($app)
    {
        return ['FlashMessages\FlashMessagesServiceProvider'];
    }

    protected function getPackageAliases($app)
    {
        return [
            'FlashMessages' => 'FlashMessages/FlashMessage/Facades/FlashMessage',
        ];
    }

    protected function resolveAndSetFlashMessage(string $text, string $type = null): FlashMessageContract
    {
        /** @var FlashMessageContract $flashMessage */
        $flashMessage = app()->make(FlashMessageContract::class);

        return $flashMessage->flashMessage($text, $type);
    }
}

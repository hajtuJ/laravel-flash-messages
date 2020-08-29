<?php

namespace FlashMessages\Tests;

use \Orchestra\Testbench\TestCase as OrchestraTestCaste;
use FlashMessages\FlashMessageContract;

class TestCase extends OrchestraTestCaste
{

    /**
     * Setup the test environment.
     */
    protected function setUp(): void
    {
        parent::setUp();

        // Your code here
    }

    protected function getPackageProviders($app)
    {
        return ['FlashMessages\FlashMessagesServiceProvider'];
    }

    protected function getPackageAliases($app)
    {
        return [
            "FlashMessages" => "FlashMessages/FlashMessage/Facades/FlashMessage",
        ];
    }

    protected function resolveAndSetFlashMessage(string $type, string $text): FlashMessageContract
    {
        /** @var FlashMessageContract $flashMessage */
        $flashMessage = app()->make(FlashMessageContract::class);
        $flashMessage->flashMessage($type, $text);

        return $flashMessage;
    }
}

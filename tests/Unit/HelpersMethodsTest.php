<?php

namespace FlashMessages\Tests\Unit;

use FlashMessages\FlashMessageContract;
use FlashMessages\Tests\TestCase;

class HelpersMethodsTest extends TestCase
{
    /** @test */
    public function is_flash_method_exists()
    {
        $this->assertTrue(function_exists('flash'));
    }

    /** @test */
    public function is_receiving_instance_of_flash_message_but_do_not_flash()
    {
        $message = flash('blah');
        $this->assertNull($message->getMessage());
    }

    /** @test */
    public function is_able_to_chain_message_type()
    {
        $message = flash('blah')->success();
        $this->assertInstanceOf(FlashMessageContract::class, $message);
        $this->assertTrue($message->hasMessage());
    }
}

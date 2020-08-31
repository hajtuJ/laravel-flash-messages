<?php


namespace FlashMessages\Tests\Unit;


use FlashMessages\FlashMessage\Facades\FlashMessage;
use FlashMessages\Tests\TestCase;

class MacroUsageTest extends TestCase
{
    /** @test */
    public function is_macro_working()
    {
        $text = 'test';
        back()->successMsg($text);
        $this->assertTrue(FlashMessage::hasMessage());
        $this->assertEquals($text, FlashMessage::getMessage()['text']);
    }

}

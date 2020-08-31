<?php

namespace FlashMessages\Tests\Unit;

use FlashMessages\Tests\TestCase;

class FleshMessageTest extends TestCase
{
    protected $caseData = ['text' => 'blah', 'type' => 'info'];

    /** @test */
    public function it_set_message()
    {
        $flashMessage = $this->resolveAndSetFlashMessage($this->caseData['text'], $this->caseData['type']);
        $setMessage = $flashMessage->getMessage();
        $this->assertEquals($setMessage['text'], $this->caseData['text']);
    }

    /** @test */
    public function is_clearing_existing_message()
    {
        $flashMessage = $this->resolveAndSetFlashMessage($this->caseData['text'], $this->caseData['type']);
        $flashMessage->forgetMessage();
        $setMessage = $flashMessage->getMessage();
        $this->assertNull($setMessage);
    }

    /** @test */
    public function is_creating_message_but_not_flash_without_type()
    {
        $flashMessage = $this->resolveAndSetFlashMessage($this->caseData['type']);
        $this->assertNull($flashMessage->getMessage());
        $flashMessage->success();
        $this->assertNotNull($flashMessage->getMessage());
    }
}

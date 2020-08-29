<?php

namespace FlashMessages\Tests\Unit;

use FlashMessages\Tests\TestCase;

class FleshMessageTest extends TestCase
{

    protected $caseData = ['text' => 'blah', 'type' => 'info'];

    /** @test */
    public function it_set_message()
    {
        $flashMessage = $this->resolveAndSetFlashMessage($this->caseData['type'], $this->caseData['text']);
        $setMessage = $flashMessage->getMessage();
        $this->assertEquals($setMessage['text'], $this->caseData['text']);
    }

    /** @test */
    public function is_clearing_existing_message()
    {
        $flashMessage = $this->resolveAndSetFlashMessage($this->caseData['type'], $this->caseData['text']);
        $flashMessage->forgetMessage();
        $setMessage = $flashMessage->getMessage();
        $this->assertNull($setMessage);
    }



}

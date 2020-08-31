<?php

namespace FlashMessages\Tests\Unit;

use FlashMessages\FlashMessage\MessageMacroFactory;
use FlashMessages\Tests\TestCase;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Str;

class MacroNameFactoryTest extends TestCase
{
    /** @test */
    public function is_creating_proper_macro_name()
    {
        $testSuffix = 'suffix';
        $testType = 'test';
        Config::set('flash-message.macro', ['suffix' => $testSuffix, 'prefix' => '']);

        $factory = new MessageMacroFactory();
        $macroName = $factory->getName($testType);
        $this->assertEquals($macroName, $testType.Str::ucfirst($testSuffix));
    }

    /** @test */
    public function is_camelcase_macro_name_when_prefix_presented()
    {
        $testSuffix = 'suffix';
        $prefix = 'prefix';
        $testType = 'test';
        Config::set('flash-message.macro', ['suffix' => $testSuffix, 'prefix' => $prefix]);

        $factory = new MessageMacroFactory();
        $macroName = $factory->getName($testType);
        $this->assertEquals($macroName, $prefix.Str::ucfirst($testType).Str::ucfirst($testSuffix));
    }
}

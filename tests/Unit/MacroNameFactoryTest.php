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
        $this->refreshApplication();

        $testSuffix = 'suffix';
        $testType = 'test';
        Config::set('flash-messsage.macro', ['suffix' => $testSuffix, 'prefix' => '']);

        $factory = new MessageMacroFactory(Config::get('flash-messsage'));
        $macroName = $factory->getName($testType);
        $this->assertEquals($macroName, $testType.Str::ucfirst($testSuffix));
    }

    /** @test */
    public function is_camelcase_macro_name_when_prefix_presented()
    {
        $this->refreshApplication();

        $testSuffix = 'suffix';
        $prefix = 'prefix';
        $testType = 'test';
        Config::set('flash-messsage.macro', ['suffix' => $testSuffix, 'prefix' => $prefix]);

        $factory = new MessageMacroFactory(Config::get('flash-messsage'));
        $macroName = $factory->getName($testType);
        $this->assertEquals($macroName, $prefix.Str::ucfirst($testType).Str::ucfirst($testSuffix));
    }

}

<?php

namespace FlashMessages\Tests\Unit;

use FlashMessages\FlashMessageContract;
use FlashMessages\Tests\TestCase;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;

class PublishesPackageTest extends TestCase
{
    /** @test */
    public function the_generate_configuration_command_is_copies_the_configuration()
    {
        // make sure we're starting from a clean state
        if (File::exists(config_path(FlashMessageContract::NAMESPACE . '.php'))) {
            unlink(config_path(FlashMessageContract::NAMESPACE . '.php'));
        }

        $this->assertFalse(File::exists(config_path(FlashMessageContract::NAMESPACE . '.php')));

        Artisan::call(FlashMessageContract::NAMESPACE . ':config');

        $this->assertTrue(File::exists(config_path(FlashMessageContract::NAMESPACE . '.php')));
    }

    /** @test */
    public function the_generate_views_command_is_copies_the_views_folder()
    {
        $path = resource_path('views/' . FlashMessageContract::NAMESPACE);
        // make sure we're starting from a clean state
        if (File::exists($path)) {
            rmdir($path);
        }

        $this->assertFalse(File::exists($path));

        Artisan::call(FlashMessageContract::NAMESPACE . ':views');

        $this->assertTrue(File::exists(config_path(FlashMessageContract::NAMESPACE . '.php')));
    }
}

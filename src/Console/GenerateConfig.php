<?php

namespace FlashMessages\Console;

use FlashMessages\FlashMessagesServiceProvider;
use Illuminate\Console\Command;

class GenerateConfig extends Command
{
    protected $signature = 'flash-message:config';

    protected $description = 'Generate config for Laravel flash messages package';

    public function handle()
    {
        $this->info('Publishing configuration...');

        $this->call('vendor:publish', [
            '--provider' => FlashMessagesServiceProvider::class,
            '--tag'      => 'config',
        ]);

        $this->info('Config generated for Laravel Flash Messages');
    }
}

<?php

namespace FlashMessages\Console;

use FlashMessages\FlashMessagesServiceProvider;
use Illuminate\Console\Command;

class GenerateViews extends Command
{
    protected $signature = 'flash-message:views';

    protected $description = 'Exporting views for Laravel flash messages package';

    public function handle()
    {
        $this->info('Publishing views...');

        $this->call('vendor:publish', [
            '--provider' => FlashMessagesServiceProvider::class,
            '--tag' => "views",
        ]);

        $this->info('Views exported for Laravel Flash Messages');
    }
}

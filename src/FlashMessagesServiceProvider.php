<?php

namespace FlashMessages;

use FlashMessages\Console\GenerateConfig;
use FlashMessages\Console\GenerateViews;
use FlashMessages\Http\Middleware\SeedFlashMessageViewFromSession;
use FlashMessages\View\Components\Bootstrap;
use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;

class FlashMessagesServiceProvider extends ServiceProvider
{
    public function boot()
    {
        /**
         * Register service.
         */
        $this->app->singleton(FlashMessageContract::class, function () {
            return new FlashMessage(config(FlashMessageContract::NAMESPACE));
        });

        /**
         * Register aliases.
         */
        $this->app->alias(\FlashMessages\FlashMessage\Facades\FlashMessage::class, 'FlashMessage');

        /**
         * Load views.
         */
        $this->loadViewsFrom(__DIR__.'/resources/views/flash-message', FlashMessageContract::NAMESPACE);

        /**
         * Register publishes.
         */
        $this->publishes([
            __DIR__.'/config/flash-message.php' => config_path(FlashMessageContract::NAMESPACE.'.php'),
        ], 'config');

        $this->publishes([
            __DIR__.'/resources/views/flash-message' => resource_path('views/vendor/'.FlashMessageContract::NAMESPACE),
        ], 'views');

        /**
         * Load components.
         */
        $this->loadViewComponentsAs(FlashMessageContract::NAMESPACE, [Bootstrap::class]);

        /**
         * Register middlewares.
         */
        $this->registerMiddlewares();

        /**
         * Console commands register.
         */
        if ($this->app->runningInConsole()) {
            $this->commands([
                GenerateConfig::class,
                GenerateViews::class,
            ]);
        }
    }

    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/config/flash-message.php',
            FlashMessageContract::NAMESPACE
        );
    }

    private function registerMiddlewares()
    {
        /** @var Router $router */
        $router = $this->app['router'];
        $router->pushMiddlewareToGroup('web', SeedFlashMessageViewFromSession::class);
    }
}

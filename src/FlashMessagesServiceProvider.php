<?php

namespace FlashMessages;

use FlashMessages\Http\Middleware\SeedFlashMessageViewFromSession;
use FlashMessages\View\Components\Bootstrap;
use Illuminate\Contracts\View\Factory;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;
use Illuminate\View\View;

class FlashMessagesServiceProvider extends ServiceProvider
{
    public function boot()
    {
        /**
         * Register service
         */
        $this->app->singleton(FlashMessageContract::class, function () {
            return new FlashMessage(config(FlashMessageContract::NAMESPACE));
        });

        /**
         * Register aliases
         */
        $this->app->alias(\FlashMessages\FlashMessage\Facades\FlashMessage::class, 'FlashMessage');


        $this->loadViewsFrom(__DIR__.'/resources/views/flash-message', FlashMessageContract::NAMESPACE);
        $this->publishes([
            //views
            __DIR__.'/resources/views/flash-message' => resource_path('views/vendor/flash-message'),
            //config
            __DIR__ . '/config/flash-message.php' => config_path('flash-message.php'),
        ]);
        $this->loadViewComponentsAs(FlashMessageContract::NAMESPACE, [ Bootstrap::class ]);
        $this->registerMiddlewares();
    }

    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/config/flash-message.php',
            FlashMessageContract::NAMESPACE
        );
//        $config = $this->getConfig();
//
//        foreach($config['types'] as $type) {
//            $this->registerViewMacros($type);
//        }
    }

    private function registerMiddlewares()
    {
        /** @var Router $router */
        $router = $this->app['router'];
        $router->pushMiddlewareToGroup('web', SeedFlashMessageViewFromSession::class);
    }

    private function registerViewMacros($type)
    {
        View::macro($this->createMacroName($type), function (string $message = '') use ($type) {
            $data = ['type' => $type, 'message' => $message, 'class' => $this->createClassName($type)];
            $this->with('flashMessage', $data);
            $viewFactory = App::make(Factory::class);
            $viewFactory->composer(['flash-message::bootstrap'], function ($view) use ($data) {
                $view->with('flashMessage', $data);
            });

            return $this;
        });
    }

    private function getConfig()
    {
        $config = $this->app->config['flash-message'];
        if (! $config) {
            return;
        }

        return $config;
    }
}

<?php

namespace Fsearch;

use Fsearch\Console\FsearchCommand;
use Illuminate\Support\ServiceProvider;

class FsearchServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'fsearch');
        $this->loadRoutesFrom(__DIR__ . '/../routes/routes.php');

        $this->publishes([
            __DIR__ . '/../config/fsearch.php' => config_path('fsearch.php'),
        ]);

        if ($this->app->runningInConsole()) {
            $this->commands([
                FsearchCommand::class,
            ]);
        }
    }

    public function register()
    {
    }
}

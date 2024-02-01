<?php

namespace Jiny\Laravel;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Illuminate\View\Compilers\BladeCompiler;

class JinyLaravelServiceProvider extends ServiceProvider
{
    private $package = "jiny-laravel";
    public function boot()
    {
        // 모듈: 라우트 설정
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
        $this->loadViewsFrom(__DIR__.'/../resources/views', $this->package);

        // 데이터베이스
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

        // 커멘드 명령
        if ($this->app->runningInConsole()) {
            $this->commands([
                \Jiny\Laravel\Console\Commands\JinyInit::class
            ]);
        }
    }

    public function register()
    {
        

    }

}

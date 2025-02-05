<?php
namespace Jiny\Laravel;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Illuminate\View\Compilers\BladeCompiler;
use Livewire\Livewire;

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

        // php artisan vendor:publish --tag=public --provider="Jiny\Laravel\JinyLaravelServiceProvider"
        // <link href="{{ asset('vendor/your-package-name/css/style.css') }}" rel="stylesheet">
        $this->publishes([
            __DIR__.'/../resources/assets' => public_path('vendor/jiny'),
        ], 'public');

        // 커멘드 명령
        if ($this->app->runningInConsole()) {
            $this->commands([
                \Jiny\Laravel\Console\Commands\JinyInit::class,
                // \Jiny\Laravel\Console\Commands\BackupSeeder::class,

                // \Jiny\Laravel\Console\Commands\TableSeeder::class,
                // \Jiny\Laravel\Console\Commands\TableDrop::class,
                // \Jiny\Laravel\Console\Commands\TableShow::class,

                \Jiny\Laravel\Console\Commands\PackageCheck::class
            ]);
        }
    }

    public function register()
    {

        /* 라이브와이어 컴포넌트 등록 */
        $this->app->afterResolving(BladeCompiler::class, function () {

            Livewire::component('artisan-view-clear',
                \Jiny\Laravel\Http\Livewire\ArtisanViewClear::class);
        });

    }

}

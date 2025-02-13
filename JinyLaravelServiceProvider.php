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
        $this->loadRoutesFrom(__DIR__.'/routes/web.php');
        $this->loadViewsFrom(__DIR__.'/resources/views', $this->package);

        // 데이터베이스
        $this->loadMigrationsFrom(__DIR__.'/database/migrations');

        // 리소스 퍼블리싱 설정
        $this->publishes([
            __DIR__.'/resources/views/welcome.blade.php' => resource_path('views/welcome.blade.php'),
        ], 'laravel-assets');

        // 다른 종류의 애셋이 있다면 별도로 지정
        // $this->publishes([
        //     __DIR__.'/resources/js' => public_path('vendor/'.$this->package.'/js'),
        // ], $this->package.'-scripts');

        // 커멘드 명령
        if ($this->app->runningInConsole()) {
            $this->commands([
                \Jiny\Laravel\Console\Commands\JinyInit::class,
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

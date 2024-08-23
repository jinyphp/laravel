<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

// 지니어드민 패키지가 설치가 되어 있는 경우에만 실행
if(function_exists("isAdminPackage")) {

    // admin prefix 모듈 검사
    if(function_exists('admin_prefix')) {
        $prefix = admin_prefix();
    } else {
        $prefix = "admin";
    }


    Route::middleware(['web','auth:sanctum', 'verified'])
    ->name('admin.')
    ->prefix($prefix."/laravel")->group(function () {
        Route::resource(
            '/',
            \Jiny\Laravel\Http\Controllers\LaravelDashboard::class);

        ## 마이그레이션 관리
        Route::resource(
            '/migrations',
            \Jiny\Laravel\Http\Controllers\LaravelMigrationController::class);

        Route::get('/view',[
            \Jiny\Laravel\Http\Controllers\LaravelViewCache::class,
            'index']);

        Route::get('setting', [\Jiny\Laravel\Http\Controllers\SettingController::class,"index"]);

    });

}

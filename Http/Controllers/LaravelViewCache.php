<?php
namespace Jiny\Laravel\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;

use Jiny\WireTable\Http\Controllers\WireDashController;
class LaravelViewCache extends WireDashController
{
    public function __construct()
    {
        parent::__construct();
        $this->setVisit($this);

        $this->actions['view']['main'] = "jiny-laravel::admin.view.main";

        $this->actions['title'] = "View Cache";
        $this->actions['subtitle'] = "라라벨 View 캐시를 관리합니다.";


    }

}

<?php
namespace Jiny\Laravel\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;

use Jiny\WireTable\Http\Controllers\WireDashController;
class LaravelDashboard extends WireDashController
{
    public function __construct()
    {
        parent::__construct();
        $this->setVisit($this);

        $this->actions['view']['main'] = "jiny-laravel::dashboard.main";

        $this->actions['title'] = "Laravel Admin";
        $this->actions['subtitle'] = "JinyPHP Laravel Admin 입니다.";

        //setMenu('menus/site.json');
        setTheme("admin/sidebar");
    }

    /*
    public function index(Request $request)
    {
        return view("jiny-laravel::laravel.dashboard");
    }
        */


}

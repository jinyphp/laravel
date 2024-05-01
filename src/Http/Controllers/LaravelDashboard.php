<?php

namespace Jiny\Laravel\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;

class LaravelDashboard extends Controller
{
    public function __construct()
    {
    }


    public function index(Request $request)
    {
        return view("jiny-laravel::laravel.dashboard");
    }


}

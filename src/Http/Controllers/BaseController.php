<?php

namespace Jiny\Laravel\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;

class BaseController extends Controller
{
    // 리소스 저장경로
    const PATH = "actions";
    protected $actions = [];

    public function __construct()
    {
        ## 라우트정보
        $this->detectURI();
        $this->detectRouteName();

        // Action 정보 디렉터리 Custom 설정
        // 값할당
        $conf = config("jiny.actions");
        $path = resource_path( $conf['path'] ?? self::PATH);
        foreach ($this->readJsonAction($path) as $key => $value)
        {
            $this->actions[$key] = $value; // Json Actions 정보를 반영
        }
    }

    // 현재 접속된 uri 분석
    private function detectURI()
    {
        // 라우터에서 uri 정보 확인
        $uri = Route::current()->uri;

        // uri에서 {} 매개변수가 있는 경우 제거함
        $slug = explode('/', $uri);
        $_slug = [];
        foreach($slug as $key => $item) {
            if($item[0] == "{") {
                // 라우터에서 분석한 매개변수 키값을 추출합니다.
                $this->actions['nesteds'] [] = substr($item, 1, strlen($item)-2);
                continue;
            }

            // 토큰 slug 저장
            $_slug []= $item;
        }

        // 라라벨 리소스 CRUD 처리
        // resource 컨트롤러에서 ~/create 는 삭제.
        $last = count($_slug)-1;
        if($_slug[$last] == "create" ||  $_slug[$last] == "edit") {
            unset($_slug[$last]);
        }

        // 재정렬된 url을 다시 생성합니다.
        // Actions 정보를 설정함
        $this->actions['route']['uri'] = implode("/",$_slug);

        return $this;
    }

    // 라우터 이름 추출
    private function detectRouteName()
    {
        $routename = Route::currentRouteName();

        // 마지막 method 라우터 이름은 제외
        $this->actions['routename'] = substr($routename,0,strrpos($routename,'.'));
        $this->actions['route']['name'] = $this->actions['routename'];

        return $this;
    }


    ## json 파일을 확인하고, 읽기
    private function readJsonAction($path)
    {
        $filename = $path.DIRECTORY_SEPARATOR;
        $filename .= str_replace("/","_",$this->actions['route']['uri']).".json";
        if (file_exists($filename)) {
            $json = file_get_contents($filename);
            return json_decode($json, true);
        }

        return [];
    }

    public function getActions()
    {
        return $this->actions;
    }


    /**
     * 싱글턴, 라이브와이어와 컨트롤러 연결
     */
    protected static $Instance;
    public $wire;
    public static function getInstance($wire)
    {
        self::$Instance->wire = $wire;
        return self::$Instance;
    }

    ## 컨트롤러를 통하여 호출시,
    ## 양방향 의존성 설정을 위한 컨트롤러 명 설정
    protected function setVisit($obj)
    {
        if ($obj && is_object($obj)) {
            $this->actions['controller'] = $obj::class;
            self::$Instance = $obj;
        }

        return $this;
    }


}

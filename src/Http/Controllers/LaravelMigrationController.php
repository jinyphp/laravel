<?php
namespace Jiny\Laravel\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Artisan;

use Jiny\WireTable\Http\Controllers\WireTablePopupForms;
//use Jiny\WireTable\Http\Controllers\LiveController;
class LaravelMigrationController extends WireTablePopupForms
{
    public function __construct()
    {
        parent::__construct();
        $this->setVisit($this);

        ##
        $this->actions['table'] = "migrations"; // 테이블 정보

        $this->actions['paging'] = 20; // 페이지 기본값

        $this->actions['view']['main'] = "jiny-laravel::laravel.migration.main";
        $this->actions['view']['title'] = "jiny-laravel::laravel.migration.title";
        //$this->actions['view']['filter'] = "jiny-laravel::migration.filter";

        $this->actions['view']['list'] = "jiny-laravel::laravel.migration.list";
        $this->actions['view']['form'] = "jiny-laravel::laravel.migration.form";

        $this->actions['view']['table'] = "jiny-laravel::laravel.migration.table";

        setTheme("admin.sidebar");
        //$this->createDisable();
    }

    /**
     * Livewire 동작후 실행되는 메서드ed
     */
    ## 목록 데이터 fetch후 호출 됩니다.
    public function hookIndexed($wire, $rows)
    {

        /*
        $this->wire->_rows = [];

        foreach ($rows as $item) {
            $id = $item->id;
            $arr = explode("_",$item->migration);

            // 일자 추출
            $this->wire->_rows[$id]['date'] = $arr[0]."_".$arr[1]."_".$arr[2]."_".$arr[3];

            // 타입
            $this->wire->_rows[$id]['type'] = $arr[4];

            // 테이블명 추출
            $this->wire->_rows[$id]['table'] = "";
            for ($i=5;$i<count($arr)-1; $i++) {
                $this->wire->_rows[$id]['table'] .= $arr[$i]."_";
            }
            $this->wire->_rows[$id]['table'] = rtrim($this->wire->_rows[$id]['table'],"_");

        }
        */

        return $rows;
    }

    public function hookCheckDeleting($wire, $selected)
    {
        $rows = DB::table("migrations")->whereIn('id', $selected)->get();
        foreach($rows as $item) {
            $arr = explode("_",$item->migration);
            if($arr[4] == "create") {
                $tablename = array_slice($arr,5);
                $tablename = array_slice($tablename,0,count($tablename)-1);
                $tablename = implode('_',$tablename);

                //dd($tablename);
                Schema::dropIfExists($tablename);
            }
        }

        //dd("aaa");
    }


    ## 선택항목 삭제 후킹
    public function hookCheckDeleted($wire, $selected)
    {
        $rows = DB::table("migrations")->whereIn('id', $selected)->get();
        foreach($rows as $item) {
            $arr = explode("_",$item->migration);
            if($arr[4] == "create") {
                $tablename = array_slice($arr,5);
                $tablename = array_slice($tablename,0,count($tablename)-1);
                $tablename = implode('_',$tablename);

                Schema::dropIfExists($tablename);
            }
        }
    }

    public function rollback($wire, $args)
    {
        //dd($args);
    }

    public function migrate($wire, $args)
    {
        //dd("migrate");
        // To run migrations
        Artisan::call('migrate');
    }

}

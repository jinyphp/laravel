<?php
namespace Jiny\Laravel\Http\Livewire;

use Illuminate\Support\Facades\Blade;
use Livewire\Component;
use Illuminate\Support\Facades\Artisan;

class ArtisanViewClear extends Component
{
    public $message;

    public function mount()
    {
        $this->message;
    }

    public function render()
    {
        return view('jiny-laravel::admin.view.clear');
    }

    public function clear()
    {
        Artisan::call('view:clear');
        $output = Artisan::output(); // Get the output
        $this->message = $output;

        $this->message .= "<br/>";
        $this->message .= "생성된 모든 view 캐시를 삭제하였습니다.";
    }


}

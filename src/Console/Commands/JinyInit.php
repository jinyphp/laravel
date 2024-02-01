<?php

namespace Jiny\Laravel\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;


class JinyInit extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'jiny:init';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'update jiny project from laravel basic';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        /*
        //$name = $this->argument('name') ?? Str::random(8);
        $name = $this->option('name') ?? Str::random(8);
        $email = $this->option('email') ?? $name."@gmail.com";
        $password = $this->option('password') ?? Str::random(12);

        // 회원 중복 검사
        if($this->isUser($email)) {
            $this->info('Fail : '. $name."@gmail.com is duplicated");
            return 0;
        }

        // 신규회원 등록
        User::create([
            'name'=>$name,
            'email'=> $email,
            'password'=>bcrypt($password)
        ]);

        // user model에서 email_verified_at 입력 지원하지 않음.
        // 모델 수정하지 않고 별도로 추가 쿼리 실행
        $verified = $this->option('verified');
        if($verified) {
            DB::table('users')->where('email', $email)->update([
                'email_verified_at' => $verified ? now() : null
            ]);
        }

        $this->info('Success : '. $name."@gmail.com password:".$password);
        return 0;
        */

        $this->info('updating laravel to jiny project...');
        return 0;
    }

}

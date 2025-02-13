<?php
use Illuminate\Support\Facades\DB;

// 패키지가 설치가 되어 있는지 확인
if(!function_exists("packageInstallCheck")) {
    function packageInstallCheck($packageName) {
        $body = file_get_contents(base_path('composer.json'));
        $composerJson = json_decode($body, true);

        $dependencies = $composerJson['require'];
        if (isset($dependencies[$packageName])) {
            return true;
        }

        return false;
    }
}

if(!function_exists("is_package")) {
    function is_package($packageName) {
        return packageInstallCheck($packageName);
    }
}



# jiny Laravel
`jiny/laravel`은 `JinyPHP`를 사용하기 위한 통합 설치 패키지 입니다. 

## 설치
지니PHP는 라라벨 기반으로 제작된 확장 기능/모듈입니다. 먼저 라라벨을 설치합니다.

```bash
composer create-project laravel/laravel 프로젝트명
cd 프로젝트명
```

설치된 라라벨 프로젝트 폴더로 이동합니다. 컴포저를 통하여 jiny 페키지를 설치합니다.

```bash
composer require jiny/laravel
```

데이터베이스 설치 및 초기화 명령을 실행합니다.

```
php artisan migrate
php artisan jiny:init
```

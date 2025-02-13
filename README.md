# jiny Laravel
`jiny/laravel`은 기존 라라벨 환경에서 `JinyPHP`환경을 구축하기 위한 스타트 페키지 입니다.
스타트 페지키를 설치하시면 인증, 사용자 관리, 관리자 페이지등 필요한 기능들을 사용할 수 있습니다.

## 설치
`jiny/laravel`은 추가 페키지 형태로 개발되었습니다. 라라벨 프로젝트를 먼저 설치한 후에 추가로 설치되는 확장 페키지 입니다.


단계1. 먼저 라라벨을 설치합니다.

```bash
composer create-project laravel/laravel 프로젝트명
cd 프로젝트명
```

설치된 라라벨 프로젝트 폴더로 이동합니다. 

단계2. 컴포저를 통하여 `jiny/laravel` 페키지를 설치합니다.

```bash
composer require jiny/laravel
```

데이터베이스 설치 및 초기화 명령을 실행합니다.

```
php artisan migrate
php artisan jiny:init
```

## 의존성
`jiny/laravel`는 추가로 몇개의 페키지가 의존됩니다.

* jiny/locale : 언어, 국가 및 로케일을 관리합니다.
* jiny/manual 
* jiny/modules : 추가 모듈을 설치 관리합니다.

* jiny/auth : 인증 패키지 입니다. 
* jiny/admin : 관리자 페이지 입니다.


## 기능
`jiny/laravel`에는 라라벨의 기능을 보다 쉽게 사용할 수 있도록 도와주는 기능들을 몇개 제공하고 있습니다.

* 테이블관리

## Assets 복사

```
php artisan vendor:publish --tag="laravel-assets-views"
```
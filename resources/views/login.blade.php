<!DOCTYPE html>
<html lang="{{ App::getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=10; IE=9; IE=8; IE=7; IE=EDGE" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="Description" content="{{ __('Đăng nhập') }} | {{ config('app.name') }}" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ __('Đăng nhập') }}</title>

    <!-- include stylesheet -->
    <link rel="stylesheet" href="{{ asset('lib/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
</head>
<body class="page-login">
    <section class="login">
        <div class="login__page d-flex align-items-center justify-content-center">
            <div class="login__container mb-4">
                <div class="login__logo mb-4">
                    <img src="{{ asset('img/logo-im.png') }}" alt="maxcloud" width="200">
                </div>
                <div class="login__form">
                    <h1 class="login__title mb-2">
                        {{ __('Đăng nhập') }}
                    </h1>
                    <span class="login__note d-block mb-4">
                        {{ __('Lần đầu ?') }}
                        <a href="{{ route('account.register-request') }}" class="text--primary">{{ __('Tạo tài khoản') }}</a>
                    </span>
                    @include('layouts.msg')
                    @if($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <div class="alert-message">
                                @foreach ($errors->all() as $message)
                                    <p class="mb-0">{!! $message !!}</p>
                                @endforeach
                            </div>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    @if($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <div class="alert-message">
                                @foreach ($errors->all() as $message)
                                    <p class="mb-0">{!! $message !!}</p>
                                @endforeach
                            </div>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <form action="{{ route('account.authentication') }}" method="POST">
                        {!! csrf_field() !!}
                        <div class="input-block mb-4">
                            <label for="email" class="input-block__label">
                                {{ __('Email') }}
                            </label>
                            <input id='email' name='email' type="email" class="form-control input-block__input">
                        </div>
                        <div class="input-block mb-4">
                            <label for="password" class="input-block__label d-flex align-items-center justify-content-between">
                                <span>{{ __('Mật khẩu') }}</span>
                                <a href="{{ route('password.request') }}" tabindex="-1" class="text--primary">
                                    {{ __('Quên mật khẩu ?') }}
                                </a>
                            </label>
                            <input id='password' name='password' type="password" class="form-control input-block__input">
                        </div>
                        <div class="form-check input-block mb-4">
                            <input class="form-check-input input-block__checkbox" type="checkbox" name="remember" id="remember">
                            <label class="form-check-label input-block__label input-block__label--checkbox" for="remember">
                                {{ __('Ghi nhớ đăng nhập') }}
                            </label>
                        </div>
                        <button class="btn button button--primary w-100">
                            {{ __('Đăng nhập') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <script src="{{ asset('lib/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>

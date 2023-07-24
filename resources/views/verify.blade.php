<!DOCTYPE html>
<html lang="{{ App::getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=10; IE=9; IE=8; IE=7; IE=EDGE" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="Description" content="{{ __('Xác thực hai bước') }} | {{ config('app.name') }}" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ __('Xác thực hai bước') }} | MaxCloud</title>

    <!-- include stylesheet -->
    <link rel="stylesheet" href="{{ asset('lib/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('lib/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
</head>
<body class="page-twoFactor">
<section class="twoFactor">
    <div class="twoFactor__page d-flex align-items-center justify-content-center">
        <div class="twoFactor__container mb-4">
            <div class="twoFactor__logo mb-4">
                <img src="{{ asset('img/logo-im.png') }}" alt="maxcloud" width="200">
            </div>
            <div class="twoFactor__form">
                <div class="twoFactor__title mb-4">
                    <img class="mb-2" src="{{ asset('img/icon-gmail.svg') }}" alt="gmail">
                    <h1 class="twoFactor__subTitle mb-2">{{ __('Xác thực hai bước') }}</h1>
                    <span class="twoFactor__description mb-3 d-block">{{ __('Nhập mã xác minh mà chúng tôi đã gửi đến') }}</span>
                    <p class="twoFactor__email">
                        {{ Str::of($user->email)->replace(Str::substr($user->email, 0, 5), '*****') }}
                    </p>
                </div>
                @if(!empty($errors) && $errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <div class="alert-message">
                            @foreach ($errors->all() as $message)
                                <p class="mb-0">{!! $message !!}</p>
                            @endforeach
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <form action="{{ route('two-factor-verify-authentication') }}" class="pt-3" id="verify-code" method="POST">
                    {!! csrf_field() !!}
                    <input type="hidden" name="token" value="{{ request()->get('token') }}">
                    <div class="twoFactor__code d-flex justify-content-between align-items-center">
                        <div class="input-code">
                            <input type="number" class="form-control input-code__input">
                        </div>
                        <div class="input-code">
                            <input type="text" class="form-control input-code__input">
                        </div>
                        <div class="input-code">
                            <input type="text" class="form-control input-code__input">
                        </div>
                        <div class="input-code">
                            <input type="text" class="form-control input-code__input">
                        </div>
                        <div class="input-code">
                            <input type="text" class="form-control input-code__input">
                        </div>
                        <div class="input-code">
                            <input type="text" class="form-control input-code__input">
                        </div>
                    </div>
                </form>

                <div class="twoFactor__resend mt-5">
                    <div id="resend-message" class="resend-code">
                        {!! __('không nhận được code? <a href="javascript:void(0)" onclick="resend()">Gửi lại</a> hoặc gọi chúng tôi') !!}
                    </div>
                    <div id="resend-code" class="resend-code">
                        {{ __('Gửi lại mã xác nhận sau') }}:
                        <span id="counter" class="resend-code__counter">60</span><span class="resend-code__units">s</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="{{ asset('js/lang.json') }}"></script>
<script src="{{ asset('lib/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('lib/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('lib/lodash/lodash.js') }}"></script>
<script src="{{ asset('js/verifyCode.js') }}"></script>
</body>
</html>
W
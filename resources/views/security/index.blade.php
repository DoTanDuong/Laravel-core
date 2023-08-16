@extends('layouts.main')
@section('title', __('Bảo mật tài khoản'))
@section('breadcrumb')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('account.dashboard') }}">{{ __('Trang chủ') }}</a></li>
        <li class="breadcrumb-item active" aria-current="page">
            {{ __('Bảo mật tài khoản') }}
        </li>
    </ol>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="box rounded-0 mb-4">
                <div class="box__content">
                    <h3 class="mb-3">{{ __('Bảo mật tài khoản của bạn') }}</h3>
                    <div id="two-factor-note" class="mb-3 d-flex">
                        <i class="fas fa-shield-alt"></i>
                        <span>{{ __('Xác thực hai bước thêm một lớp bảo mật bổ sung cho tài khoản của bạn. Để đăng nhập, ngoài ra, bạn sẽ cần cung cấp mã gồm 6 chữ số') }}</span>
                    </div>
                    @if(!empty(Auth::user()->twoFactor->two_factor_secret))
                        <p>{{ __('Xác thực hai bước đang được kích hoạt.') }}</p>
                        <button class="btn button button--danger" data-status="disable" data-title="{{__('Huỷ kích hoạt')}}"
                                data-bs-toggle="modal" data-bs-target="#confirm-password">
                            {{ __('Huỷ kích hoạt') }}
                        </button>
                    @else
                        <p>{{ __('Xác thực hai bước chưa kích hoạt.') }}</p>
                        <button class="btn button button--primary" data-status="enable" data-title="{{__('Kích hoạt')}}"
                                data-bs-toggle="modal" data-bs-target="#confirm-password">
                            {{ __('Kích hoạt') }}
                        </button>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="box rounded-0">
                <div class="box__content">
                    <h3 class="mb-3">{{ __('Đổi mật khẩu') }}</h3>
                    <form action="{{ route('account.change_password') }}" method="post">
                        {!! csrf_field() !!}
                        <div class="input-block mb-3">
                            <label for="current_pass" class="input-block__label">
                                {{ __('Mật khẩu hiện tại') }}
                            </label>
                            <input id="current_pass" name="current_pass" data-require="true" type="password" class="form-control input-block__input">
                            @if ($errors->has('current_pass'))
                                <span id="current_pass-error" class="input-block__error">{{ $errors->first('current_pass') }}</span>
                            @endif
                        </div>
                        <div class="input-block mb-3">
                            <label for="new_pass" class="input-block__label">
                                {{ __('Mật khẩu mới') }}
                            </label>
                            <input id="new_pass" name="password" data-require="true" type="password" class="form-control input-block__input">
                            @if ($errors->has('password'))
                                <span id="password-error" class="input-block__error">{{ $errors->first('password') }}</span>
                            @endif
                        </div>
                        @include('pages.account.components.blade.passwordStrength', ['element' => 'new_pass'])
                        <div class="alert alert--primary note" role="alert">
                            {!! __('password_tip') !!}
                        </div>
                        <div class="input-block mb-3">
                            <label for="confirm_pass" class="input-block__label">
                                {{ __('Xác nhận mật khẩu') }}
                            </label>
                            <input id="confirm_pass" name="password_confirmation" data-require="true" type="password" class="form-control input-block__input">
                        </div>
                        <button class="btn button button--primary">{{ __('Lưu thay đổi') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="confirm-password" tabindex="-1" aria-labelledby="confirmPasswordLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="confirm-password-form" onsubmit="submitConfirm(); return false;">
                    <div class="modal-header">
                        <h5 class="modal-title" id="confirmPasswordLabel">
                            <span class="modal-status"></span> {{ __('Xác thực hai bước') }}
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        @if(empty(Auth::user()->twoFactor->two_factor_secret))
                            <div class="methods">
                                <p>{!! __('Hãy chọn phương thức xác thực') !!}</p>
                                @foreach(config('twoFactor.enable') as $index =>$method)
                                    <div class="form-check method @if($index != 0) mt-3 @endif">
                                        <input class="form-check-input method__input" @if($index == 0) checked @endif value="1" type="radio" name="method" id="method-{{$method}}">
                                        <label class="form-check-label method__label" for="method-{{$method}}">
                                            <div class="method__icon">
                                                {!! config('twoFactor.icons')[$method] !!}
                                            </div>
                                            <div class="method__message">
                                                <p>{{ __('two_factor_method_'.config('twoFactor.method')[$method]) }}</p>
                                                <span>
                                                    {{ __('two_factor_method_description_'.config('twoFactor.method')[$method]) }}
                                                </span>
                                            </div>
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                        <div class="confirm-pass @if(empty(Auth::user()->twoFactor->two_factor_secret)) hide @endif">
                            <p>{!! __('Để <span class="modal-status mx-1"></span> xác thực hai bước hãy xác nhận mật khẩu.') !!}</p>
                            <div class="input-block">
                                <label for="email" class="input-block__label">
                                    {{ __('Nhập mật khẩu của bạn') }}
                                </label>
                                <input id="email" name="password" data-require="true" type="password" class="form-control input-block__input">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        @if(empty(Auth::user()->twoFactor->two_factor_secret))
                            <button id="next-confirm-pass" type="button" class="btn button button--gold">
                                {{ __('Tiếp tục') }}
                            </button>
                            <button id="back-confirm-pass" type="button" class="btn button button--secondary hide">
                                {{ __('Quay lại') }}
                            </button>
                        @endif
                        <button id="confirm-password-submit" @if(empty(Auth::user()->twoFactor->two_factor_secret)) disabled @endif class="btn button button--primary">
                            <span class="modal-status"></span> {{ __('Xác thực hai bước') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('head')
@endsection

@section('footer')
    <script src="{{ asset('js/twoFactor.js') }}"></script>
@endsection

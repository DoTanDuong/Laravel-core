@extends('mails.layout')
@section('content')
    Xin chào {{ $name }}!
    <span class="block mb-15">Mã xác thực của bạn là:</span>
    <p class="backup-code-block">
        Mã xác thực: <span class="backup-code"> {{ $code }} </span>
    </p>
    <p class="backup-code-block">
        Mã xác thực: <span class="backup-code"> {{ $code }} </span>
    </p>
    <p class="backup-code-block">
        Mã xác thực: <span class="backup-code"> {{ $code }} </span>
    </p>
    <br/>
    <span class="block">Regards,</span>
    Factor
@endsection

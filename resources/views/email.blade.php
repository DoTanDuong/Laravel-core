@extends('mails.layout')
@section('content')
    Xin chào {{ $name }}!
    <span class="block mb-15">Vui lòng nhấp vào nút bên dưới để xác minh địa chỉ email của bạn.</span>
    <a href="{{ $url }}" class="btn--primary">Xác nhận địa chỉ email</a>
    <br/>
    <span class="block">Regards,</span>
    MaxCloud

    Xin chào {{ $name }}!
    <span class="block mb-15">Vui lòng nhấp vào nút bên dưới để xác minh địa chỉ email của bạn.</span>
    <a href="{{ $url }}" class="btn--primary">Xác nhận địa chỉ email</a>
    <br/>
    <span class="block">Regards,</span>
    MaxCloud
@endsection

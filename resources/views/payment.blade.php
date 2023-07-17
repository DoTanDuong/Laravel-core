@extends('mails.layout')
@section('content')
    <span class="block mb-15">Tin nhắn chuyển khoản không xác định user:</span>
    <span class="block mb-15">Mã khách hàng: {{ $user }}</span>
    <span class="block mb-15">Số tiền nạp: {{ $amount }}</span>
    <span class="block mb-15">Phương thức thanh toán: {{ $payment_method }}</span>
@endsection

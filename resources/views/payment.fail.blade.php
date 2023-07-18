@extends('mails.layout')
@section('content')
    <span class="block mb-15">Add Credit thất bại qua tin nhắn, vui lòng add credit thủ công:</span>
    <span class="block mb-15">Tên khách hàng: {{ $name }}</span>
    <span class="block mb-15">Email khách hàng: {{ $email }}</span>
    <span class="block mb-15">Số tiền nạp: {{ $amount }}</span>
    <span class="block mb-15">Phương thức thanh toán: {{ $payment_method }}</span>
@endsection

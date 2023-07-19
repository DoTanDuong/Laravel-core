@extends('mails.layout')
@section('content')
    <p>Xin chào!</p>
    <span class="block mb-15">{{ __('Gần đây, một yêu cầu đã được gửi để đặt lại mật khẩu của bạn cho khu vực khách hàng của chúng tôi. Nếu bạn không yêu cầu điều này, vui lòng bỏ qua email này. Nó sẽ hết hạn và trở nên vô dụng trong thời gian 2 giờ.') }}</span>
    <span class="block">{{ __('Để đặt lại mật khẩu của bạn, vui lòng truy cập url bên dưới') }}:</span>
    <a href="{{ $url }}">{{ $url }}</a> <br /><br />
    <span class="block">Regards,</span>
    MaxCloud
@endsection

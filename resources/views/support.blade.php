@extends('layouts.main')
@section('title', __('Tickets') . ' #'. $ticket->tid)
@section('breadcrumb')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('account.dashboard') }}">{{ __('Trang chủ') }}</a></li>
        <li class="breadcrumb-item"><a href="{{ route('account.tickets') }}">{{ __('Tickets') }}</a></li>
        <li class="breadcrumb-item active" aria-current="page">
            {{ __('Tickets') }} #{{ $ticket->tid }}
        </li>
    </ol>
@endsection

@section('content')
    <div class="row">
        <div class="col-4">
            <div class="box">
                <div class="box__header">
                    <h3>{{ __('Thông tin Ticket') }}</h3>
                </div>
                <div class="box__content">
                    <div class="info">
                        <p class="info__item">
                            <span class="info__content info__content--bold d-block">
                                #{{ $ticket->tid }} - {{ $ticket->title }}
                            </span>
                            <span class="status status--{{ \Illuminate\Support\Str::lower($ticket->status) }}">
                                {{ $ticket->status }}
                            </span>
                        </p>
                        <p class="info__item">
                            <label class="info__label">{{ __('Phòng ban') }}:</label>
                            <span class="info__content">
                                {{ $ticket->department->name }}
                            </span>
                        </p>
                        <p class="info__item">
                            <label class="info__label">{{ __('Ngày tạo') }}:</label>
                            <span class="info__content">
                                {{ date('d-m-Y H:s', strtotime($ticket->date)) }}
                            </span>
                        </p>
                        <p class="info__item">
                            <label class="info__label">{{ __('Trả lời lần cuối') }}:</label>
                            <span class="info__content">
                                {{ date('d-m-Y H:s', strtotime($ticket->lastreply)) }}
                            </span>
                        </p>
                        <p class="info__item">
                            <label class="info__label">{{ __('Độ ưu tiên') }}:</label>
                            <span class="info__content">
                                {{ $ticket->urgency }}
                            </span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-8">
            <div class="box">
                <div class="box__header">
                    <h3>{{ __('Nội dung') }}</h3>
                </div>
                <div class="box__content p-0 mt-3">
                    <div class="chat">
                        <div class="chat__message">
                            @include('pages.account.components.blade.message-chat', ['ticket' => $ticket])
                            @foreach($ticket->reply as $reply)
                                @include('pages.account.components.blade.message-chat', ['ticket' => $reply])
                            @endforeach
                        </div>
                        <div class="chat__editor">
                            <form id="reply-form" action="{{ route('account.reply.create', ['ticket_id' => $ticket->id]) }}">
                                <textarea id="reply" cols="30" rows="5"></textarea>
                                <div id="preview-block-reply" class="d-flex align-items-center">
                                </div>
                                <div class="d-flex align-items-center justify-content-between p-3">
                                    <label class="btn button button--primary" for="reply-file">
                                        Attach files
                                        <input id="reply-file" name="att[]" class="d-none" type="file" multiple>
                                    </label>
                                    <button type="button" id="reply-submit" class="btn button button--primary">{{ __('Gửi') }}</button>
                                </div>
                            </form>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('head')
@endsection

@section('footer')
    <script src="{{ asset('lib/md-editor/simplemde.min.js') }}"></script>
    <script>
        let last_reply = '{{ $ticket->reply->isNotEmpty() ? $ticket->reply->last()->id : 0 }}';
        let sync_ticket = '{{ route('account.tickets.sync', ['ticket_id' => $ticket->id]) }}';
    </script>
    <script src="{{ asset('js/detail-ticket.js') }}"></script>
@endsection

@extends('layouts.main')
@section('title', __('Tickets'))
@section('breadcrumb')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('account.dashboard') }}">{{ __('Trang chủ') }}</a></li>
        <li class="breadcrumb-item active" aria-current="page">
            {{ __('Tickets') }}
        </li>
    </ol>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="box">
                <div class="box__header border-0">
                    <div class="d-flex align-items-center justify-content-end mb-4">
                        <a class="button button--primary" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#open-ticket">
                            {{ __("Tạo Ticket") }}
                        </a>
                    </div>
                    <form action="" id="search-form">
                        <div class="row mb-4">
                            <div class="col-md-4">
                                <div class="input-block">
                                    <label for="department" class="input-block__label">
                                        {{ __('Phòng ban') }}
                                    </label>
                                    <select name="department" id="department" class="input-block__select form-control">
                                        <option value="">All</option>
                                        @foreach($departments as $department)
                                            <option @if(request()->input('department') == $department->id) selected @endif value="{{ $department->id }}">
                                                {{ $department->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="input-block">
                                    <label for="status" class="input-block__label">
                                        {{ __('Trạng thái') }}
                                    </label>
                                    <select name="status" id="status" class="input-block__select form-control">
                                        <option value="">All</option>
                                        @foreach($status as $st)
                                            <option @if(request()->input('status') == $st->title) selected @endif value="{{ $st->title }}">
                                                {{ $st->title }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="input-block">
                                    <label for="urgency" class="input-block__label">
                                        {{ __('Độ ưu tiên') }}
                                    </label>
                                    <select name="urgency" id="urgency" class="input-block__select form-control">
                                        <option value="">All</option>
                                        @foreach(['High', 'Medium', 'Low'] as $property)
                                            <option @if(request()->input('urgency') == $property) selected @endif value="{{ $property }}">{{$property}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="input-block">
                                    <input id='keyword' type="text" name="keyword" placeholder="{{ __('Điền từ khoá để tìm kiếm') }}"
                                           class="form-control input-block__input" value="{{ request()->input('keyword', '') }}">
                                </div>
                            </div>
                            <div class="col-md-4 d-flex align-items-center">
                                <button class="btn button button--success mx-2">{{ __('Tìm kiếm') }}</button>
                                <button type="button" class="btn button button--gold mx-2" onclick='$("#search-form").find("input, select").val("")'>
                                    {{ __('Reset') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="box__content mt-3">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    @include('pages.account.components.blade.sort_header_table', ['fields' => \App\Models\Whmcs\Ticket::fields()])
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($tickets as $ticket)
                                    <tr class="table__link-row" onclick="window.location='{{route('account.ticket', ['id' => $ticket->id])}}'">
                                        <td class="table__content">{{ $ticket->department->name }}</td>
                                        <td class="table__content text--danger">
                                            <a href="javascript:void(0)" class="d-block text--primary">#{{ $ticket->tid}}</a>
                                            {{ $ticket->title }}
                                        </td>
                                        <td class="table__content">
                                            <span class="status status--{{ \Illuminate\Support\Str::lower($ticket->status) }}">
                                                 {{ $ticket->status }}
                                            </span>
                                        </td>
                                        <td class="table__content">
                                            <span class="urgency">{{ $ticket->urgency }}</span>
                                        </td>
                                        <td class="table__content">{{ date("d-m-Y (H:i)", strtotime($ticket->lastreply)) }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="d-flex align-items-center justify-content-end">
                        {!! $tickets->appends($_GET)->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('head')
@endsection

@section('footer')
@endsection

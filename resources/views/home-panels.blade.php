<section class="home-panels">
    <div class="row">
        <div class="col-md-6">
            @if (isset($services))
                <div class="box rounded-0 box--gold mb-4">
                    <div class="box__header text--gray d-flex align-items-center justify-content-between">
                        <h5 class="mb-0 flex-70">
                            <i class="fas fa-box"></i>
                            {{__('Dịch Vụ Đang Hoạt Động')}}
                        </h5>
                        <a href="#" class="btn button button--gold flex-30">
                            <i class="fas fa-plus"></i>
                            {{ __('Xem tất cả') }}
                        </a>
                    </div>
                    <div>
                        @foreach($services as $service)
                            <div class="home-panels__item">
                                <a href="" class="home-panels__link">
                                    <div class="home-panels__title">
                                        {{ $service->product->group->name }} - {{ $service->product->name }}
                                    </div>
                                    <div class="home-panels__status">
                                    <span class="status status--active">
                                        {{ $service->domainstatus }}
                                    </span>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
            <div class="box rounded-0 box--success mb-4">
                <div class="box__header text--gray d-flex align-items-center justify-content-between">
                    <h5 class="mb-0 flex-70">
                        <i class="far fa-newspaper"></i>
                        {{__('Tin Tức')}}
                    </h5>
                    <a href="{{ route('account.news') }}" class="btn button button--success flex-30">
                        <i class="fas fa-plus"></i>
                        {{ __('Xem tất cả') }}
                    </a>
                </div>
                <div>
                    @foreach($announcements as $announcement)
                        <div class="home-panels__item">
                            <a href="{{ route('account.news.detail', ['id' => $announcement->id]) }}" class="home-panels__link">
                                <div class="home-panels__title">
                                    {{ $announcement->title }}.
                                    <div class="home-panels__time">
                                        {{ date('d-m-Y (H:s)', strtotime($announcement->date)) }}.
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        @if (isset($tickets))
            <div class="col-md-6">
                <div class="box rounded-0 box--primary mb-4">
                    <div class="box__header text--gray d-flex align-items-center justify-content-between">
                        <h5 class="mb-0 flex-70">
                            <i class="fas fa-comments"></i>
                            {{__('Các yêu cầu hỗ trợ gần đây')}}
                        </h5>
                        <a href="{{ route('account.tickets') }}" class="btn button button--primary flex-30">
                            <i class="fas fa-plus"></i>
                            {{ __('Xem tất cả') }}
                        </a>
                    </div>
                    <div>
                        @foreach($tickets as $ticket)
                            <div class="home-panels__item">
                                <a href="{{ route('account.ticket', ['id' => $ticket->id]) }}" class="home-panels__link">
                                    <div class="home-panels__title">
                                        #{{ $ticket->tid }} - {{ $ticket->title }}.
                                        <div class="home-panels__time">
                                            {{ __('Trả lời lần cuối') }}: {{ date('d-m-Y (H:s)', strtotime($ticket->updated_at)) }}.
                                        </div>
                                    </div>
                                    <div class="home-panels__status">
                                        <span class="status status--{{ \Illuminate\Support\Str::slug($ticket->status) }}">
                                            {{ $ticket->status }}
                                        </span>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif
    </div>
</section>

@foreach (['danger', 'warning', 'success', 'info'] as $msg)
    @if(Session::has($msg))
        <div class="row">
            <div class="col-12">
                <div class="alert alert-{{ $msg }} alert-dismissible fade show" role="alert">
                    <div class="alert-message">
                        {!! Session::get($msg) !!}
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        </div>
    @endif
@endforeach


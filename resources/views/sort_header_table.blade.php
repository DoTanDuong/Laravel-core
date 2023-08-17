@foreach($fields as $col => $field)
    @php($isSort = !empty($field['sort']))
    <th class="table__header {{ $isSort ? 'sorting' : '' }}" @if($isSort) data-sort="{{$col}}" @endif>
        <span class="table__title">
            {{ $field['name'] }}
        </span>
        @if($isSort)
            <span class="table__sort">
                @if(request()->input('sort_by') == $col)
                    @if(request()->input('sort_type', 'asc') == 'asc')
                        <i class="fas fa-arrow-down"></i>
                    @else
                        <i class="fas fa-arrow-up"></i>
                    @endif
                @endif
            </span>
        @endif

        @if($isSort)
            <span class="table__sort">
                @if(request()->input('sort_by') == $col)
                    @if(request()->input('sort_type', 'asc') == 'asc')
                        <i class="fas fa-arrow-down"></i>
                    @else
                        <i class="fas fa-arrow-up"></i>
                    @endif
                @endif
            </span>
        @endif
    </th>
@endforeach

@push('scripts')
    <script src="{{ asset('js/sort.js') }}"></script>
@endpush


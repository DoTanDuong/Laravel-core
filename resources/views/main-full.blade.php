<!DOCTYPE html>
<html lang="{{ App::getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=10; IE=9; IE=8; IE=7; IE=EDGE" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="Description" content="@yield('title') | {{ config('app.name') }}" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') | {{ config('app.name') }}</title>

    <!-- include stylesheet -->
    <link rel="stylesheet" id="fa-icon-lib" href="{{ asset('lib/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('lib/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('lib/md-editor/simplemde.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    @yield('head')
</head>
<body>
    <x-sidebar/>
    <x-main-nav/>

    <section class="main mt-4">
        <section class="main__header">
            <div class="container">
                @include('layouts.msg')
            </div>
        </section>
        <section class="main__content">
            <div class="container">
                @yield('content')
                @yield('components')
            </div>
        </section>

        <section class="main__content">
            <div class="container">
                @yield('content')
                @yield('components')
            </div>
        </section>
        
    </section>

    <div class="overlay"></div>
    <script>
        let user = '{{ \Illuminate\Support\Facades\Auth::id() }}';
    </script>
    @yield('footer')
    @stack('scripts')
</body>
</html>

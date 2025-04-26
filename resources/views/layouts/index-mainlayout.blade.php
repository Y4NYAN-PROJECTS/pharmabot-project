<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'My Laravel App')</title>

    <link rel="shortcut icon" href="{{ asset('/mazer-assets/compiled/svg/favicon.svg') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('/mazer-assets/compiled/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('/mazer-assets/compiled/css/app-dark.css') }}">
    <link rel="stylesheet" href="{{ asset('/mazer-assets/compiled/css/auth.css') }}">
</head>


{{-- This is a Blade comment and won't be rendered or processed --}}
{{-- @include('partials.nav') --}}
{{-- @yield('content') --}}
{{-- @include('footer') --}}

<body>
    <script src="{{ asset('/mazer-assets/static/js/initTheme.js') }}"></script>
    <div id="auth">
        <div class="row h-100">
            {{--[ Section/Content ]--}}
            <div class="col-lg-5 d-flex justify-content-center align-items-center">
                @yield('content')
            </div>

            <div class="col-lg-7 d-none d-lg-block">
                <div id="auth-right" style="background-image: url('/project-images/sti-background.png'); background-size: cover; background-position: center; filter: brightness(50%)">
                </div>
            </div>
        </div>
    </div>

    @yield('scripts') {{-- Optional section for page-specific scripts --}}
</body>

</html>
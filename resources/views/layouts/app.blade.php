<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('layouts.navigations.head')
<body>
    <div id="app">
        @include('layouts.navigations.topnav')
        <div class="container">
            <div class=" mt-3">
                @include('layouts.partials.alerts')
                @yield('content')
            </div>
        </div>

    </div>
</body>
</html>

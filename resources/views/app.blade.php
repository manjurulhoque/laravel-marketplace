<!DOCTYPE html>
<html lang="en">

<head>
    @include('partials.header')
</head>
<body>
    @include('partials.navbar')

    <div id="all">
        <div id="content">
            @yield('slider')
            @yield('content')
        </div>
        @include('partials.footer')
    </div>
    @include('partials.javascripts')
</body>
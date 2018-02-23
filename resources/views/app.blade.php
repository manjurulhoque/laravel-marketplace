<!DOCTYPE html>
<html lang="en">

<head>
    @include('partials.header')
</head>
<body>
    @include('partials.navbar')

    <div id="all">
        <div id="content">
            <div class="container">
                <div class="col-md-12">
                    <div id="main-slider">
                        <div class="item">
                            <img src="" alt="" class="img-responsive">
                        </div>
                        <div class="item">
                            <img class="img-responsive" src="" alt="">
                        </div>
                        <div class="item">
                            <img class="img-responsive" src="" alt="">
                        </div>
                        <div class="item">
                            <img class="img-responsive" src="" alt="">
                        </div>
                    </div>
                    <!-- /#main-slider -->
                </div>
            </div>
            @yield('content')
        </div>
        @include('partials.footer')
    </div>
    @include('partials.javascripts')
</body>
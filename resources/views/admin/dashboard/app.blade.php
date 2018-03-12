<!DOCTYPE html>
<html lang="en">

@include('admin.dashboard.partials.header')

<body>

<div id="wrapper">

    <!-- Navigation -->
    @include('admin.dashboard.partials.nav-side')

    <div id="page-wrapper">
        @yield('content')
    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

@include('admin.dashboard.partials.footer')

</body>

</html>

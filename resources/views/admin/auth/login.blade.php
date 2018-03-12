<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
    <title>Admin Login</title>
</head>
<body>
<div class="login">
    <div class="container">
        <div class="col-lg-6 col-lg-offset-3">

            <div class="inner-form">
                <h1>Admin Login</h1>
                <form role="form" method="post" action="{{ route('admin.login.post') }}">
                    {{ csrf_field() }}
                    <div class="row">

                        <div class="col-lg-12">
                            <label>Email</label>
                            <div class="form-group">
                                <input type="email" name="email" id="email" class="form-control" placeholder="email">
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <label>Password</label>
                            <div class="form-group">
                                <input type="password" name="password" id="password" class="form-control" placeholder="password">
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <button type="submit" class="btn btn-default">
                                <span>LOGIN</span>
                            </button>
                        </div>

                    </div>
                </form>

            </div> <!-- inner-form -->

        </div>
    </div>
</div>
<script src="{{ asset('js/jquery-1.11.0.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
</body>
</html>
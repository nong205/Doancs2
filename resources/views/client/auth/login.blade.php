<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Đăng nhập Admin</title>

    <link href="{{ asset('assets/backend/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/backend/font-awesome/css/font-awesome.css') }}" rel="stylesheet">

    <link href="{{ asset('assets/backend/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/backend/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/backend/css/customize.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('assets/client/css/customs.css') }}" />

</head>

<body class="gray-bg">

<div class="loginColumns animated fadeInDown">
    <div class="row">

        <div class="col-md-3">

        </div>

        <div class="col-md-6">

            <div class="ibox-content">
                <h3 class="text-center mb-5">
                    Đăng nhập, hoặc
                    <a href="{{ route('client.register') }}">Đăng ký</a>
                </h3>
                <hr>

                @include('layouts.message')

                <form class="m-t" role="form" action="" method="post" >
                    @csrf
                    <div class="form-group">
                        <input type="text"
                               class="form-control"
                               placeholder="Email"
                               name="email"
                               value="{{ old('email') }}"
                        >
                        @error('email')
                        <div class="error-danger">* {{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="password"
                               class="form-control"
                               placeholder="Mật khẩu"
                               name="password"
                        >
                        @error('password')
                        <div class="error-danger">* {{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary block full-width m-b">
                        Đăng nhập
                    </button>

                    <a href="{{ route('client.forgot') }}">
                        <p class="text-center">Quên mật khẩu?</p>
                    </a>
                </form>
                <div class="login-or">
                    <hr class="hr-or">
                    <span class="span-or">or</span>
                </div>
                <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <a href="{{ route('auth.google') }}" class="btn btn-lg btn-google btn-block">
                            <i class="fa fa-google"></i>
                            <span>Google</span>
                        </a>
                    </div>

                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <a href="#" class="btn btn-lg btn-fb btn-block btn-facebook">
                            <i class="fa fa-facebook"></i>
                            <span>Facebook</span>
                        </a>
                    </div>

                </div>



            </div>
        </div>

        <div class="col-md-3">

        </div>
    </div>
    <hr/>

</div>

</body>

</html>


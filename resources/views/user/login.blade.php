<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Страница входа в админ-панель «Аренда высоты»</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('backend/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('backend/dist/css/adminlte.min.css') }}">
</head>
<body class="hold-transition register-page">
<div class="register-box">

    <div class="card">
        <div class="card-body register-card-body">
            <p class="login-box-msg">Вход в админ-панель</p>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="list-unstyled">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if (session()->has('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            @if (session()->has('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            <form action="{{ route('login') }}" method="post">
                @csrf
                <div class="input-group mb-3">
                    <input type="email" name="email" class="form-control" placeholder="Введите email">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" name="password" class="form-control" placeholder="Введите пароль">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-8">
                        <button type="submit" class="btn btn-primary btn-block">Войти</button>
                        <a href="{{ url('login/google') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" width="30px" height="30px"><path fill="#FFC107" d="M43.611,20.083H42V20H24v8h11.303c-1.649,4.657-6.08,8-11.303,8c-6.627,0-12-5.373-12-12c0-6.627,5.373-12,12-12c3.059,0,5.842,1.154,7.961,3.039l5.657-5.657C34.046,6.053,29.268,4,24,4C12.955,4,4,12.955,4,24c0,11.045,8.955,20,20,20c11.045,0,20-8.955,20-20C44,22.659,43.862,21.35,43.611,20.083z"/><path fill="#FF3D00" d="M6.306,14.691l6.571,4.819C14.655,15.108,18.961,12,24,12c3.059,0,5.842,1.154,7.961,3.039l5.657-5.657C34.046,6.053,29.268,4,24,4C16.318,4,9.656,8.337,6.306,14.691z"/><path fill="#4CAF50" d="M24,44c5.166,0,9.86-1.977,13.409-5.192l-6.19-5.238C29.211,35.091,26.715,36,24,36c-5.202,0-9.619-3.317-11.283-7.946l-6.522,5.025C9.505,39.556,16.227,44,24,44z"/><path fill="#1976D2" d="M43.611,20.083H42V20H24v8h11.303c-0.792,2.237-2.231,4.166-4.087,5.571c0.001-0.001,0.002-0.001,0.003-0.002l6.19,5.238C36.971,39.205,44,34,44,24C44,22.659,43.862,21.35,43.611,20.083z"/>
                            </svg>
                        </a>
                        <a href="{{ url('vk/auth') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0,0,256,256" width="30px" height="30px"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><g transform="scale(5.33333,5.33333)"><path d="M42,37c0,2.762 -2.238,5 -5,5h-26c-2.761,0 -5,-2.238 -5,-5v-26c0,-2.762 2.239,-5 5,-5h26c2.762,0 5,2.238 5,5z" fill="#1976d2"/><path d="M35.937,18.041c0.046,-0.151 0.068,-0.291 0.062,-0.416c-0.015,-0.362 -0.264,-0.625 -0.85,-0.625h-2.618c-0.661,0 -0.966,0.4 -1.144,0.801c0,0 -1.632,3.359 -3.513,5.574c-0.61,0.641 -0.92,0.625 -1.25,0.625c-0.177,0 -0.624,-0.214 -0.624,-0.801v-5.185c0,-0.694 -0.173,-1.014 -0.732,-1.014h-4.649c-0.407,0 -0.619,0.32 -0.619,0.641c0,0.667 0.898,0.827 1,2.696v3.623c0,0.88 -0.153,1.04 -0.483,1.04c-0.89,0 -2.642,-3 -3.815,-6.932c-0.254,-0.774 -0.508,-1.068 -1.169,-1.068h-2.643c-0.763,0 -0.89,0.374 -0.89,0.774c0,0.721 0.6,4.619 3.875,9.101c2.375,3.25 5.504,5.125 8.274,5.125c1.678,0 1.85,-0.427 1.85,-1.094v-2.972c0.001,-0.801 0.184,-0.934 0.718,-0.934c0.381,0 1.158,0.25 2.658,2c1.73,2.018 2.044,3 3.036,3h2.618c0.608,0 0.957,-0.255 0.971,-0.75c0.003,-0.126 -0.015,-0.267 -0.056,-0.424c-0.194,-0.576 -1.084,-1.984 -2.194,-3.326c-0.615,-0.743 -1.222,-1.479 -1.501,-1.879c-0.187,-0.261 -0.258,-0.445 -0.249,-0.621c0.009,-0.185 0.105,-0.361 0.249,-0.607c-0.026,0 3.358,-4.751 3.688,-6.352z" fill="#ffffff"/></g></g>
                            </svg>
                        </a>
                        {{-- <a href="{{ url('login/yandex') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0,0,256,256" width="30px" height="30px"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><g transform="scale(5.33333,5.33333)"><path d="M42,37c0,2.762 -2.238,5 -5,5h-26c-2.761,0 -5,-2.238 -5,-5v-26c0,-2.762 2.239,-5 5,-5h26c2.762,0 5,2.238 5,5z" fill="#1976d2"/><path d="M35.937,18.041c0.046,-0.151 0.068,-0.291 0.062,-0.416c-0.015,-0.362 -0.264,-0.625 -0.85,-0.625h-2.618c-0.661,0 -0.966,0.4 -1.144,0.801c0,0 -1.632,3.359 -3.513,5.574c-0.61,0.641 -0.92,0.625 -1.25,0.625c-0.177,0 -0.624,-0.214 -0.624,-0.801v-5.185c0,-0.694 -0.173,-1.014 -0.732,-1.014h-4.649c-0.407,0 -0.619,0.32 -0.619,0.641c0,0.667 0.898,0.827 1,2.696v3.623c0,0.88 -0.153,1.04 -0.483,1.04c-0.89,0 -2.642,-3 -3.815,-6.932c-0.254,-0.774 -0.508,-1.068 -1.169,-1.068h-2.643c-0.763,0 -0.89,0.374 -0.89,0.774c0,0.721 0.6,4.619 3.875,9.101c2.375,3.25 5.504,5.125 8.274,5.125c1.678,0 1.85,-0.427 1.85,-1.094v-2.972c0.001,-0.801 0.184,-0.934 0.718,-0.934c0.381,0 1.158,0.25 2.658,2c1.73,2.018 2.044,3 3.036,3h2.618c0.608,0 0.957,-0.255 0.971,-0.75c0.003,-0.126 -0.015,-0.267 -0.056,-0.424c-0.194,-0.576 -1.084,-1.984 -2.194,-3.326c-0.615,-0.743 -1.222,-1.479 -1.501,-1.879c-0.187,-0.261 -0.258,-0.445 -0.249,-0.621c0.009,-0.185 0.105,-0.361 0.249,-0.607c-0.026,0 3.358,-4.751 3.688,-6.352z" fill="#ffffff"/></g></g>
                            </svg>
                        </a> --}}
                    </div>
                    <!-- /.col -->
                </div>
            </form>
{{--            <div class="mt-2">--}}
{{--                <a href="#" class="text-center">У меня нет аккаунта</a>--}}
{{--            </div>--}}

        </div>
        <!-- /.form-box -->
    </div><!-- /.card -->
</div>
<!-- /.register-box -->
</body>
</html>

<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="https://imagensemoldes.com.br/wp-content/uploads/2020/06/Imagem-Megafone-PNG.png" type="image/x-icon"/>
    <title>CidaColab</title>

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    @yield('header')
</head>

<body style="background-color: #f5f5f5">
    <div id="app">
        @include('layouts.flash-messages')
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <img width="50" src="https://imagensemoldes.com.br/wp-content/uploads/2020/06/Imagem-Megafone-PNG.png" alt="cidacolab">
                <a class="navbar-brand ml-2" href="{{ url('/') }}">
                {{ config('app.name', 'CidaColab') }}
            </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

                <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                    <ul class="navbar-nav">
                        @if (Auth::guest())
                        <li class="nav-item"><a href="{{ route('login') }}" class="nav-link">Login</a></li>
                        <li class="nav-item"><a href="{{ route('register') }}" class="nav-link">Register</a></li>
                        @else
                            @include('layouts.partials.navbar')
                        @endif
                    </ul>
                </div>

            </div>
        </nav>

        <vue-snotify></vue-snotify>

        @yield('custom-template')

        <div class="container-fluid pt-3 pl-5 pr-5 pb-5">
                @include('layouts.breadcrumb')

            @yield('content')
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ mix('js/manifest.js') }}"></script>
    <script src="{{ mix('js/vendor.js') }}"></script>
    <script src="{{ mix('js/app.js') }}"></script>

    @yield('footer')
</body>
</html>

@extends('layouts.app')

@section('content')
    <div class="row d-flex">
        <div class="col-lg-6">
            <div class="card1">
                <div class="row px-3 justify-content-center mt-5 border-line">
                    <img width="100%" src="https://highsales.digital/images/blog/estrategias-de-marketing-digital-deve-escolher-o-canal-de-trafego-correto.png">
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="card2 card border-0 px-4 py-5">
                <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                    {{ csrf_field() }}
                <div class="row px-3">
                    <label class="mb-1">
                        <h6 class="mb-0 text-sm">Email Address</h6>
                    </label>

                    <input class="mb-4 {{ $errors->has('email') ? ' is-invalid' : '' }}"
                           id="email"
                           type="text"
                           name="email"
                           value="{{ old('email') }}"
                           placeholder="Enter a valid email address">

                    @if ($errors->has('email'))
                        <div class="invalid-feedback">
                            <strong>{{ $errors->first('email') }}</strong>
                        </div>
                    @endif
                </div>
                <div class="row px-3">
                    <label class="mb-1">
                        <h6 class="mb-0 text-sm">Password</h6>
                    </label>
                    <input type="password"
                           id="password"
                           name="password"
                           class="{{ $errors->has('password') ? ' is-invalid' : '' }}"
                           placeholder="Enter password">

                    @if ($errors->has('password'))
                        <div class="invalid-feedback">
                            <strong>{{ $errors->first('password') }}</strong>
                        </div>
                    @endif
                </div>
                <div class="row px-3 mb-4">
                    <div class="custom-control custom-checkbox custom-control-inline">
                        <input id="chk1"
                               type="checkbox"
                               name="remember"
                               class="custom-control-input"
                               {{ old('remember') ? 'checked' : '' }}>
                        <label for="chk1" class="custom-control-label text-sm">Remember me</label>
                    </div>
                    <a href="{{ route('password.request') }}" class="ml-auto mb-0 text-sm">Forgot Password?</a>
                </div>
                <div class="row mb-3 px-3">
                    <button type="submit" class="btn btn-dark text-center">Login</button>
                </div>
                </form>
            </div>
        </div>
    </div>


{{--<div class="container">--}}
{{--    <div class="row justify-content-md-center mt-5">--}}
{{--        <div class="col-md-8">--}}
{{--            <div class="card">--}}
{{--                <div class="card-body">--}}
{{--                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">--}}
{{--                        {{ csrf_field() }}--}}

{{--                        <div class="form-group row mt-4">--}}
{{--                            <label for="email" class="col-lg-4 col-form-label text-lg-right">E-Mail Address</label>--}}

{{--                            <div class="col-lg-6">--}}
{{--                                <input--}}
{{--                                        id="email"--}}
{{--                                        type="email"--}}
{{--                                        class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"--}}
{{--                                        name="email"--}}
{{--                                        value="{{ old('email') }}"--}}
{{--                                        required--}}
{{--                                        autofocus--}}
{{--                                >--}}

{{--                                @if ($errors->has('email'))--}}
{{--                                    <div class="invalid-feedback">--}}
{{--                                        <strong>{{ $errors->first('email') }}</strong>--}}
{{--                                    </div>--}}
{{--                                @endif--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="form-group row">--}}
{{--                            <label for="password" class="col-lg-4 col-form-label text-lg-right">Password</label>--}}

{{--                            <div class="col-lg-6">--}}
{{--                                <input--}}
{{--                                        id="password"--}}
{{--                                        type="password"--}}
{{--                                        class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"--}}
{{--                                        name="password"--}}
{{--                                        required--}}
{{--                                >--}}

{{--                                @if ($errors->has('password'))--}}
{{--                                    <div class="invalid-feedback">--}}
{{--                                        <strong>{{ $errors->first('password') }}</strong>--}}
{{--                                    </div>--}}
{{--                                @endif--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="form-group row">--}}
{{--                            <div class="col-lg-6 offset-lg-4">--}}
{{--                                <div class="form-check">--}}
{{--                                    <label class="form-check-label">--}}
{{--                                        <input type="checkbox" class="form-check-input" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me--}}
{{--                                    </label>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="form-group row">--}}
{{--                            <div class="col-lg-8 offset-lg-4">--}}
{{--                                <button type="submit" class="btn btn-primary">--}}
{{--                                    Login--}}
{{--                                </button>--}}

{{--                                <a class="btn btn-link" href="{{ route('password.request') }}">--}}
{{--                                    Forgot Your Password?--}}
{{--                                </a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </form>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
@endsection

<style>
    body {
        color: #000;
        overflow-x: hidden;
        height: 100%;
        background-color: #B0BEC5;
        background-repeat: no-repeat
    }

    .card0 {
        box-shadow: 0px 4px 8px 0px #757575;
        border-radius: 0px
    }

    .card2 {
        margin: 0px 40px
    }

    .logo {
        width: 200px;
        height: 100px;
        margin-top: 20px;
        margin-left: 35px
    }

    .image {
        width: 360px;
        height: 280px
    }

    .border-line {
        border-right: 1px solid #EEEEEE
    }

    .facebook {
        background-color: #3b5998;
        color: #fff;
        font-size: 18px;
        padding-top: 5px;
        border-radius: 50%;
        width: 35px;
        height: 35px;
        cursor: pointer
    }

    .twitter {
        background-color: #1DA1F2;
        color: #fff;
        font-size: 18px;
        padding-top: 5px;
        border-radius: 50%;
        width: 35px;
        height: 35px;
        cursor: pointer
    }

    .linkedin {
        background-color: #2867B2;
        color: #fff;
        font-size: 18px;
        padding-top: 5px;
        border-radius: 50%;
        width: 35px;
        height: 35px;
        cursor: pointer
    }

    .line {
        height: 1px;
        width: 45%;
        background-color: #E0E0E0;
        margin-top: 10px
    }

    .or {
        width: 10%;
        font-weight: bold
    }

    .text-sm {
        font-size: 14px !important
    }

    ::placeholder {
        color: #BDBDBD;
        opacity: 1;
        font-weight: 300
    }

    :-ms-input-placeholder {
        color: #BDBDBD;
        font-weight: 300
    }

    ::-ms-input-placeholder {
        color: #BDBDBD;
        font-weight: 300
    }

    input,
    textarea {
        padding: 10px 12px 10px 12px;
        border: 1px solid lightgrey;
        border-radius: 2px;
        margin-bottom: 5px;
        margin-top: 2px;
        width: 100%;
        box-sizing: border-box;
        color: #2C3E50;
        font-size: 14px;
        letter-spacing: 1px
    }

    input:focus,
    textarea:focus {
        -moz-box-shadow: none !important;
        -webkit-box-shadow: none !important;
        box-shadow: none !important;
        border: 1px solid #304FFE;
        outline-width: 0
    }

    button:focus {
        -moz-box-shadow: none !important;
        -webkit-box-shadow: none !important;
        box-shadow: none !important;
        outline-width: 0
    }

    a {
        color: inherit;
        cursor: pointer
    }

    .btn-blue {
        background-color: #1A237E;
        width: 150px;
        color: #fff;
        border-radius: 2px
    }

    .btn-blue:hover {
        background-color: #000;
        cursor: pointer
    }

    .bg-blue {
        color: #fff;
        background-color: #1A237E
    }

    @media screen and (max-width: 991px) {
        .logo {
            margin-left: 0px
        }

        .image {
            width: 300px;
            height: 220px
        }

        .border-line {
            border-right: none
        }

        .card2 {
            border-top: 1px solid #EEEEEE !important;
            margin: 0px 15px
        }
    }
</style>

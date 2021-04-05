@extends('layouts.auth')

@section('title', 'Reset Password')

@section('body-class', 'login-page')

@section('content')
<div class="card-body login-card-body">
    <div class="form-group text-center">
        <a href="{{ route('home') }}">
            <img class="img" alt="Aplikasi KPPN Purwodadi" height="48"
                src="{{ asset('assets/img/logo-siwanda-2.png') }}">
        </a>
    </div>
    <div class="login-box-msg">
        <h5>Reset Password</h5>
    </div>

    <form method="POST" action="{{ route('password.update') }}">
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">
        <div class="form-group">
            <input name="email" type="text" class="form-control @error('email') is-invalid @enderror"
                value="{{ $email ?? old('email') }}" placeholder="Alamat Email" autocomplete="email" required autofocus>
            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="password">Password Baru<span class="text-warning">*</span></label>
            <div class="input-group @error('password') is-invalid @enderror">
                <input name="password" id="password" type="password"
                    class="form-control @error('password') is-invalid @enderror" value="{{ old('password') }}"
                    placeholder="Password Baru" autocomplete="off" required>
                <div class="passwordtoggle input-group-append" style="cursor: pointer;">
                    <div class="input-group-text">
                        <span id="icon" class="fas fa-eye"></span>
                    </div>
                </div>
            </div>
            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="password_confirmation">Ulangi Password<span class="text-warning">*</span></label>
            <div class="input-group @error('password_confirmation') is-invalid @enderror">
                <input name="password_confirmation" id="password_confirmation" type="password"
                    class="form-control @error('password_confirmation') is-invalid @enderror"
                    value="{{ old('password_confirmation') }}" placeholder="Ulangi Password" autocomplete="off"
                    required>
                <div class="passwordtoggle input-group-append" style="cursor: pointer;">
                    <div class="input-group-text">
                        <span id="icon1" class="fas fa-eye"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group mb-4">
            <button type="submit" class="btn btn-primary btn-block font-weight-bold">Ubah Password</button>
        </div>
    </form>

    @guest
    <div class="form-group text-center">
        Kembali ke halaman <a href="{{ route('login') }}">Login</a>.
    </div>
    @endguest
</div>
@endsection

@section('b')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group row">
                            <label for="email"
                                class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ $email ?? old('email') }}" required autocomplete="email"
                                    autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password"
                                class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    required autocomplete="new-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm"
                                class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control"
                                    name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Reset Password') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
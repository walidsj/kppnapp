@extends('layouts.auth')

@section('title', 'Register Akun')

@section('body-class', 'register-page')
@section('auth-box-class', '')

@section('content')
<div class="card-body register-card-body">
    <div class="form-group text-center">
        <a href="{{ route('home') }}">
            <img class="img" alt="Aplikasi KPPN Purwodadi" height="48"
                src="{{ asset('assets/img/logo_kppn_pwd.png') }}">
        </a>
    </div>
    <div class="login-box-msg">
        <h4>Register Akun</h4>
    </div>

    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="email">Alamat Email<span class="text-warning">*</span></label>
                        <input name="email" type="email" id="email"
                            class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}"
                            placeholder="Alamat Email" autocomplete="email" required>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="username">Username<span class="text-warning">*</span></label>
                        <input name="username" type="text" id="username"
                            class="form-control @error('username') is-invalid @enderror" value="{{ old('username') }}"
                            placeholder="Username" autocomplete="off" required>
                        @error('username')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password">Password<span class="text-warning">*</span></label>
                        <div class="input-group @error('password') is-invalid @enderror">
                            <input name="password" id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror"
                                value="{{ old('password') }}" placeholder="Password" autocomplete="off" required>
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
                                value="{{ old('password_confirmation') }}" placeholder="Ulangi Password"
                                autocomplete="off" required>
                            <div class="passwordtoggle input-group-append" style="cursor: pointer;">
                                <div class="input-group-text">
                                    <span id="icon1" class="fas fa-eye"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="workunit_id">Satuan Kerja<span class="text-warning">*</span></label>
                        <select name="workunit_id" class="form-control select2" id="workunit_id" style="width: 100%;"
                            autocomplete="off" required>
                            <option disabled selected>Pilih Satuan Kerja..</option>
                            @foreach ($workunits as $workunit)
                            <option value="{{ $workunit->id }}"
                                {{ (old('workunit_id') == $workunit->id ? 'selected' : '') }}>
                                {{ $workunit->code }} - {{ $workunit->name }}
                            </option>
                            @endforeach
                        </select>
                        @error('workunit_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="name">Nama Lengkap<span class="text-warning">*</span></label>
                        <input name="name" type="text" id="name"
                            class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}"
                            placeholder="Nama Lengkap" autocomplete="name" required>
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="nip">NIP<span class="text-warning">*</span></label>
                        <input name="nip" type="number" id="nip" class="form-control @error('nip') is-invalid @enderror"
                            value="{{ old('nip') }}" placeholder="NIP" autocomplete="nip" required>
                        @error('nip')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="position_id">Jabatan<span class="text-warning">*</span></label>
                        <select name="position_id" class="form-control select2" id="position_id" style="width: 100%;"
                            autocomplete="off" required>
                            <option disabled selected>Pilih Jabatan..</option>
                            @foreach ($positions as $position)
                            <option value="{{ $position->id }}"
                                {{ (old('position_id') == $position->id ? 'selected' : '') }}>
                                {{ $position->name }}</option>
                            @endforeach
                        </select>
                        @error('position_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="handphone">No. Handphone<span class="text-warning">*</span></label>
                        <input name="handphone" type="number" id="handphone"
                            class="form-control @error('handphone') is-invalid @enderror" value="{{ old('handphone') }}"
                            placeholder="No. Handphone" autocomplete="handphone" required>
                        @error('handphone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group mb-4">
            <button type="submit" class="btn btn-primary btn-block font-weight-bold">Register</button>
        </div>
    </form>

    @guest
    <div class="form-group text-center">
        <a href="{{ route('login') }}">Login</a>
    </div>
    @endguest
</div>
@endsection
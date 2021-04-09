@extends('layouts.panel')

@section('title', 'Pengaturan Akun')

@section('content')
<div class="row">
    @if (session('status'))
    <div class="col-12">
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    </div>
    @endif
    @if (session('error'))
    <div class="col-12">
        <div class="alert alert-danger" role="alert">
            {{ session('error') }}
        </div>
    </div>
    @endif
    <div class="col-md-6">
        <div class="card shadow-sm mb-3">
            <div class="card-header px-0">
                <div class="px-2 py-3">
                    <div class="img rounded pb-2 text-center">
                        <img class="img shadow-sm rounded-circle" src="{{ asset('assets/img/user.jpg') }}"
                            alt="User Avatar" width="84">
                    </div>
                    <div class="text-center">
                        <h4 class="font-weight-bolder">{{ Auth::user()->name }}</h4>
                        <h6>NIP. {{ Auth::user()->nip }}</h6>
                    </div>
                </div>
            </div>
            <div class="card-body py-0">
                <ul class="list-group list-group-unbordered mb-3">
                    <li class="list-group-item border-0">
                        <b>Username</b>
                        <br>
                        {{ Auth::user()->username }}
                    </li>
                    <li class="list-group-item border-0">
                        <b>Alamat Email</b>
                        <br>
                        {{ Auth::user()->email }}
                    </li>
                    <li class="list-group-item border-0">
                        <b>Satuan Kerja</b>
                        <br>
                        {{ Auth::user()->workunit->name }}
                    </li>
                    <li class="list-group-item border-0">
                        <b>Jabatan</b>
                        <br>
                        {{ Auth::user()->position->name }}
                    </li>
                    <li class="list-group-item border-0">
                        <b>No. Handphone</b>
                        <br>
                        {{ Auth::user()->handphone }}
                    </li>
                    <li class="list-group-item border-0">
                        <b>Tgl. Daftar</b>
                        <br>
                        {{ \Carbon\Carbon::parse(Auth::user()->created_at)->isoFormat('dddd, D MMMM YYYY') }}
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-md-4 mb-3">
        <div class="card shadow-sm mb-3">
            <div class="card-header">
                <h3 class="card-title">Ubah Password</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('profile_settings.password.update') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="old_password">Password Lama<span class="text-warning">*</span></label>
                        <div class="input-group @error('old_password') is-invalid @enderror">
                            <input name="old_password" id="old_password" type="password"
                                class="form-control @error('old_password') is-invalid @enderror"
                                value="{{ old('old_password') }}" placeholder="Password Lama" autocomplete="off"
                                required>
                            <div class="passwordtoggle input-group-append" style="cursor: pointer;">
                                <div class="input-group-text">
                                    <span id="icon" class="fas fa-eye"></span>
                                </div>
                            </div>
                        </div>
                        @error('old_password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password">Password Baru<span class="text-warning">*</span></label>
                        <div class="input-group @error('password') is-invalid @enderror">
                            <input name="password" id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror"
                                value="{{ old('password') }}" placeholder="Password Baru" autocomplete="off" required>
                            <div class="passwordtoggle input-group-append" style="cursor: pointer;">
                                <div class="input-group-text">
                                    <span id="icon1" class="fas fa-eye"></span>
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
                        <label for="password_confirmation">Ulangi Password Baru<span
                                class="text-warning">*</span></label>
                        <div class="input-group @error('password_confirmation') is-invalid @enderror">
                            <input name="password_confirmation" id="password_confirmation" type="password"
                                class="form-control @error('password_confirmation') is-invalid @enderror"
                                value="{{ old('password_confirmation') }}" placeholder="Ulangi Password Baru"
                                autocomplete="off" required>
                            <div class="passwordtoggle input-group-append" style="cursor: pointer;">
                                <div class="input-group-text">
                                    <span id="icon2" class="fas fa-eye"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i>
                            Ubah Password</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
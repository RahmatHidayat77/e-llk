@extends('layouts.app')

@section('content')
<div class="app-container app-theme-white">
    <div>
        <div class="h-100 bg-premium-dark">
            <div class="d-flex h-100 justify-content-center align-items-center">
                <div class="mx-auto app-login-box col-md-8">
                    <div class="app-logo-inverse mx-auto mb-3"></div>
                    <div class="modal-dialog w-100">
                        <div class="modal-content">
                            <form method="POST" action="{{ route('register') }}">
                                @csrf
                                <div class="modal-body">
                                    <h5 class="modal-title">
                                        <h4 class="mt-2">
                                            {{-- <div>Selamat datang,</div> --}}
                                            <span>Isikan <span class="text-success">form dibawah
                                                    </span> untuk membuat akun</span>
                                        </h4>
                                    </h5>
                                    <div class="divider"></div>
                                    <div id="exampleInputGroup1" role="group" class="form-group">
                                        <div> <input id="email" type="email" placeholder="Masukkan email..."
                                                class="form-control @error('email') is-invalid @enderror" name="email"
                                                autocomplet="off" value="{{ old('email') }}" required
                                                autocomplete="email">

                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror</div>
                                        </div>
                                        <div role="group" class="form-group">
                                            <div><input id="name" type="text" placeholder="Masukkan nama..."
                                                    class="form-control @error('name') is-invalid @enderror" name="name"
                                                    autocomplet="off" value="{{ old('name') }}"
                                                    required autocomplete="name" autofocus>

                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" placeholder="Masukkan NIP..."
                                                class="form-control @error('nip') is-invalid @enderror" name="nip"
                                                autocomplet="off" required>
                                        </div>
                                        <div class="form-group">
                                            <select name="jabatan" class="form-control @error('jabatan') is-invalid @enderror">
                                                <option>Pilih Jabatan</option>
                                                <option value="pegawai">Pegawai</option>
                                                <option value="kasubag">KaSubBag</option>
                                                <option value="sekretaris">Sekretaris</option>
                                            </select>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div id="exampleInputGroup2" role="group" class="form-group">
                                                    <div><input id="password" type="password"
                                                            placeholder="Enter password..."
                                                            class="form-control @error('password') is-invalid @enderror"
                                                            name="password" required autocomplete="new-password">

                                                        @error('password')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div id="exampleInputGroup2" role="group" class="form-group">
                                                    <div>
                                                        <input id="password-confirm" type="password"
                                                            placeholder="Enter password..." class="form-control"
                                                            name="password_confirmation" required
                                                            autocomplete="new-password">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="divider"></div>
                                        {{-- <h6 class="mb-0">
                                            Sudah memiliki akun ?
                                            <a href="{{ route('login') }}" class="text-primary">Masuk</a></h6> --}}
                                    </div>
                                    <div class="modal-footer d-block text-center"><button color="primary" type="submit"
                                            type="button"
                                            class="btn btn-wide btn-pill btn-shadow btn-hover-shine btn-secondary btn-lg">Buat
                                            Account
                                        </button></div>
                            </form>
                        </div>
                    </div>
                    <div class="text-center text-white opacity-8 mt-3">
                        Copyright © Me
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

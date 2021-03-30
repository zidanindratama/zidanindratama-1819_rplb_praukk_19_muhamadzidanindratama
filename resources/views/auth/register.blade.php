@extends('layout-default.home')
@section('judul', 'Register Akun | WarungKita')
@section('content')
    <div class="login-page container pt-5 mt-5">
        <section class="home container pt-5 mt-5">
            <div class="row">
                <div class="col-lg-12 my-auto">
                    <div class="row">
                        <div class="home-content offset-lg-1 col-lg-10" data-aos="fade-up" data-aos-duration="2000">
                            <form method="POST" action="{{ route('register') }}">
                                @csrf
                                <h1>Selamat datang</h1>
                                <h3>Daftar sekarang!</h3>
                                <div class="form-group mt-4">
                                        <label for="email">Nama</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" id="email" aria-describedby="emailHint" placeholder="Masukkan nama anda">
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                                <div class="form-group mt-4">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" id="email" aria-describedby="emailHint" placeholder="Masukkan email anda">
                                         @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <small id="emailHint" class="form-text text-muted">Kami tidak
                                            akan memberitahu email anda kepada orang lain
                                        </small>
                                </div>
                                <div class="form-group">
                                        <label for="name">Password</label>
                                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="name" placeholder="Masukkan password anda">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                                <div class="form-group">
                                        <label for="name">Konfirmasi Password</label>
                                        <input id="password-confirm" type="password" class="form-control" id="name" name="password_confirmation" required autocomplete="new-password" placeholder="Ketik ulang password anda">
                                </div>
                                <button type="submit" class="btn btn-lg btn-primary">Submit</button>
                                <small id="submitHint" class="form-text text-muted text-center sign">sudah punya akun?
                                    <a href="/login">login sekarang</a>
                                </small>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
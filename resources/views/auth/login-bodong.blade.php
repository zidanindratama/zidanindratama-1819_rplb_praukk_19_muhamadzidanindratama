@extends('layout-default.home')

@section('content')
                <div class="login-page container pt-5 mt-5">
                    <section class="home container pt-5 mt-5">
                            <div class="row">
                                    <div class="col-lg-12 my-auto">
                                        <div class="row">
                                                <div class="home-content offset-lg-1 col-lg-10" data-aos="fade-up"
                                                        data-aos-duration="2000">
                                                        <h1>Selamat datang</h1>
                                                        <h3>Daftar sekarang!</h3>
                                                        <div class="form-group mt-4">
                                                                <label for="email">Nama</label>
                                                                <input type="text" class="form-control" id="email"
                                                                    aria-describedby="emailHint"
                                                                    placeholder="Masukkan nama anda">
                                                        </div>
                                                        <div class="form-group mt-4">
                                                                <label for="email">Email</label>
                                                                <input type="email" class="form-control" id="email"
                                                                    aria-describedby="emailHint"
                                                                    placeholder="Masukkan email anda">
                                                                <small id="emailHint" class="form-text text-muted">Kami tidak
                                                                    akan memberitahu email anda kepada orang lain</small>
                                                        </div>
                                                        <div class="form-group">
                                                                <label for="name">Password</label>
                                                                <input type="password" class="form-control" id="name"
                                                                    placeholder="Masukkan password anda">
                                                        </div>
                                                        <div class="form-group">
                                                                <label for="name">Konfirmasi Password</label>
                                                                <input type="password" class="form-control" id="name"
                                                                    placeholder="Ketik ulang password anda">
                                                        </div>
                                                        <button class="btn btn-lg btn-primary"
                                                                href="homepage.html">Submit</button>
                                                        <small id="submitHint"
                                                                class="form-text text-muted text-center sign">sudah punya akun?
                                                                <a href="signup.html">login sekarang</a></small>
                                                </div>
                                        </div>
                                    </div>
                            </div>
                    </section>
                </div>
@endsection
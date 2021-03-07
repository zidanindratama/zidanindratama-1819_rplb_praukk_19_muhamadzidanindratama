@extends('layout-dashboard.home')

@section('content')
<div class="col-md-12 mt-4">
                                <div class="card">
                                    <div class="card-body">
                                        <!-- title -->
                                        <div class="d-md-flex align-items-center">
                                            <div>
                                                <h2 class="card-title">Tambah Menu</h2>
                                            </div>
                                        </div>
                                        <!-- title -->
                                        <form action="/menu" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <p>Nama : </p>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input type="text" name="name" id="" class="form-control @error('name') is-invalid @enderror" value="{{old('name')}}" placeholder="nama makanan" autocomplete="off">
                                                        @error('name')
                                                            <span class="invalid-feedback">Masukkan data yang benar!</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <p>Harga : </p>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input type="text" name="price" id="" class="form-control @error('price') is-invalid @enderror" value="{{old('price')}}" placeholder="harga makanan">
                                                        @error('price')
                                                            <span class="invalid-feedback">Masukkan data yang benar!</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <p>Status : </p>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <select name="status" id="" class="form-control">
                                                            <option value="Tersedia">Tersedia</option>
                                                            <option value="Tidak tersedia">Tidak Tersedia</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <p>Deskripsi : </p>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <textarea name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" id="" cols="30" rows="10">masukkan pesan anda di sini!</textarea>
                                                        @error('deskripsi')
                                                            <span class="invalid-feedback">Masukkan data yang benar!</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <p>Gambar makanan : </p>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <div class="custom-file">
                                                            <input type="file" name="gambar" class="custom-file-input" id="validatedCustomFile">
                                                            <label class="custom-file-label" for="validatedCustomFile">Pilih gambar...</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-primary mb-5 mt-3 mr-4">submit</button>
                                            <a href="/menu" class="btn btn-success mb-5 mt-3">kembali</a>
                                        </form>
                                    </div>
                                </div>
                            </div>
@endsection
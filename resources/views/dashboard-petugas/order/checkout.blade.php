@extends('layout-dashboard.home')

@section('content')
                            <div class="col-md-12 mt-4">
                                <div class="card">
                                    <div class="card-body">
                                        <!-- title -->
                                        <div class="d-md-flex align-items-center">
                                            <div>
                                                <h2 class="card-title">Halaman Checkout</h2>
                                            </div>
                                        </div>
                                        <!-- title -->
                                        {!! Form::model($user, ['url' => 'order/checkout']) !!}								
                                        @csrf
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <p>Email : </p>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        {!! Form::text('email', null, ['placeholder' => 'Email', 'readonly' => true, 'class' => 'form-control']) !!}
                                                        @error('customer_email')
                                                            <span class="invalid-feedback">Masukkan data yang benar!</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <p>Nama Depan : </p>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                    {!! Form::text('first_name', null, ['required' => true, 'class' => 'form-control', 'placeholder' => 'Nama depan pelanggan']) !!}
                                                        @error('first_name')
                                                            <span class="invalid-feedback">Masukkan data yang benar!</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <p>Nama Belakang : </p>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                    {!! Form::text('last_name', null, ['required' => true, 'class' => 'form-control', 'placeholder' => 'Nama belakang pelanggan']) !!}
                                                        @error('last_name')
                                                            <span class="invalid-feedback">Masukkan data yang benar!</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <p>Nomor Telepon : </p>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                    {!! Form::text('phone', null, ['required' => true, 'class' => 'form-control', 'placeholder' => 'Nomor telepon pelanggan']) !!}
                                                        @error('phone')
                                                            <span class="invalid-feedback">Masukkan data yang benar!</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <p>No Meja : </p>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <div class="card shadow">
                                                                <div class="card-body">
                                                                    <h4 class="card-title">Meja No 1</h4>
                                                                    <input type="radio" name="no_meja" id="" value="1"> Pilih
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="card shadow">
                                                                <div class="card-body">
                                                                    <h4 class="card-title">Meja No 2</h4>
                                                                    <input type="radio" name="no_meja" id="" value="2"> Pilih
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="card shadow">
                                                                <div class="card-body">
                                                                    <h4 class="card-title">Meja No 3</h4>
                                                                    <input type="radio" name="no_meja" id="" value="3"> Pilih
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="card shadow">
                                                                <div class="card-body">
                                                                    <h4 class="card-title">Meja No 4</h4>
                                                                    <input type="radio" name="no_meja" id="" value="4"> Pilih  
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="card shadow">
                                                                <div class="card-body">
                                                                    <h4 class="card-title">Meja No 5</h4>
                                                                    <input type="radio" name="no_meja" id="" value="5"> Pilih
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="card shadow">
                                                                <div class="card-body">
                                                                    <h4 class="card-title">Meja No 6</h4>
                                                                    <input type="radio" name="no_meja" id="" value="6"> Pilih
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="card shadow">
                                                                <div class="card-body">
                                                                    <h4 class="card-title">Meja No 7</h4>
                                                                    <input type="radio" name="no_meja" id="" value="7"> Pilih
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="card shadow">
                                                                <div class="card-body">
                                                                    <h4 class="card-title">Meja No 8</h4>
                                                                    <input type="radio" name="no_meja" id="" value="8"> Pilih
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @error('no_meja')
                                                            <span class="invalid-feedback">Masukkan data yang benar!</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <p>Keterangan : </p>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <textarea name="keterangan" class="form-control" id="" cols="30" rows="10">masukkan pesan anda di sini!</textarea>
                                                        @error('keterangan')
                                                            <span class="invalid-feedback">Masukkan data yang benar!</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6 mt-5">
                                                    <h5>Pesanan Anda</h5>
                                                </div>
                                                <div class="col-md-6 mt-5">
                                                    <table class="table table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <th scope="col">Deskripsi</th>
                                                                <th scope="col">Total</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @forelse ($items as $item)
                                                                @php
                                                                    $product = isset($item->associatedModel->parent) ? $item->associatedModel->parent : $item->associatedModel;
                                                                @endphp
                                                                <tr class="cart_item">
                                                                    <td class="product-name">
                                                                        {{ $item->name }}	<strong class="product-quantity"> × {{ $item->quantity }}</strong>
                                                                    </td>
                                                                    <td class="product-total">
                                                                        <span class="amount">{{ number_format(\Cart::get($item->id)->getPriceSum()) }}</span>
                                                                    </td>
                                                                </tr>
                                                            @empty
                                                                <tr>
                                                                    <td colspan="2">The cart is empty! </td>
                                                                </tr>
                                                            @endforelse
                                                        </tbody>
                                                        <tfoot>
                                                            <tr class="cart-subtotal">
                                                                <th>Subtotal</th>
                                                                <td><span class="amount">{{ number_format(\Cart::getSubTotal()) }}</span></td>
                                                            </tr>
                                                            <tr class="cart-subtotal">
                                                                <th>Tax</th>
                                                                <td><span class="amount">{{ number_format(\Cart::getCondition('TAX 10%')->getCalculatedValue(\Cart::getSubTotal())) }}</span></td>
                                                            </tr>
                                                            <tr class="order-total">
                                                                <th>Order Total</th>
                                                                <td><strong><span class="total-amount">{{ number_format(\Cart::getTotal()) }}</span></strong>
                                                                </td>
                                                            </tr>								
                                                        </tfoot>
                                                    </table>
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-primary mb-2 mt-3 mr-4">Checkout</button>
                                            <a href="/carts" class="btn btn-success mb-2 mt-3">kembali</a>
                                        {!! Form::close() !!}
                                    </div>
                                </div>
                            </div>
					
@endsection
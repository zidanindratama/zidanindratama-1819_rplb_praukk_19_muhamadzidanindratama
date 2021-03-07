@extends('layout-dashboard.home')

@section('content')
<div class="col-md-12 mt-4">
                                <div class="card">
                                    <div class="card-body">
                                        <!-- title -->
                                        <div class="d-md-flex align-items-center">
                                            <div>
                                                <h2 class="card-title">Buat Order</h2>
                                            </div>
                                        </div>
                                        <!-- title -->
                                        <form action="">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="row">
                                                        @foreach($menus as $menu)
                                                        <input type="hidden" name="menu_id" value="{{$menu->id}}">
														<div class="col-sm-3 col-xs-3">
															<div class="card shadow">
																<img class="card-img-top rounded" src="{{ asset( $menu->gambar ) }}" style="width: 100%; display: block;
																margin-left: auto;
																margin-right: auto;" alt="">
																<div class="card-body">
																	<div class="row">
																		<div class="col">
																			<h4 class="card-title">{{$menu->name}}</h4>
																			<p class="card-text">@currency($menu->price)</p>
																		</div>
                                                                        <div class="col">
                                                                            <a  href="/order/{{$menu->id}}" class="btn btn-success">Pesan</a>
                                                                        </div>
																	</div>
																</div>
															</div>
														</div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-primary mb-5 mt-3 mr-4">submit</button>
                                            <a href="" class="btn btn-success mb-5 mt-3">kembali</a>
                                        </form>
                                    </div>
                                </div>
                            </div>
@endsection
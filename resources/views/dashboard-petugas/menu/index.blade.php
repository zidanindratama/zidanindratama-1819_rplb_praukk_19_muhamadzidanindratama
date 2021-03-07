@extends('layout-dashboard.home')

@section('content')
    <div class="col-md-12 mt-4">
                                <div class="card">
                                    <div class="card-body">
                                        <!-- title -->
                                        <div class="d-md-flex align-items-center">
                                            <div>
                                                <h4 class="card-title">List Menu</h4>
                                                <h5 class="card-subtitle">Diurutkan dari inputan terbaru</h5>
                                                <a href="/menu/create" class="btn btn-success">Tambah Menu</a>
                                            </div>
                                        </div>
                                        <!-- title -->
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table v-middle">
                                            <thead>
                                                <tr class="bg-light">
                                                    <th class="border-top-0">Id</th>
                                                    <th class="border-top-0">Nama</th>
                                                    <th class="border-top-0">Harga</th>
                                                    <th class="border-top-0">Status</th>
                                                    <th class="border-top-0">Gambar</th>
                                                    <th class="border-top-0">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($menus as $menu)
                                                <tr>
                                                    <td scope="row">{{$menu->id}}</td>
                                                    <td>{{$menu->name}}</td>
                                                    <td>@currency($menu->price)</td>
                                                    <td>{{$menu->status}}</td>
                                                    <td><img src="{{ asset( $menu->gambar ) }}" class="img-fluid" style="width: 200px;" alt="">
                                                    </td>
                                                    <td>
                                                        <form action="/menu/{{$menu->id}}" method="post">
                                                            @csrf
                                                            @method('delete')
                                                            <a href="/menu/{{$menu->id}}" class="btn btn-primary">detail</a>
                                                            @if(auth()->user()->role == 'Administrator') 
                                                            <a href="/menu/{{$menu->id}}/edit" class="btn btn-warning">edit</a>
                                                            <button type="submit" class="btn btn-danger">hapus</button>
                                                            @endif
                                                        </form>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        {{$menus->links()}}
                                    </div>
                                </div>
                            </div>
@endsection
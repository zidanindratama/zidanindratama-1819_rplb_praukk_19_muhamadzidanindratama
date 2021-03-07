@extends('layout-dashboard.home')

@section('content')
    <div class="col-md-12 mt-4">
                                <div class="card">
                                    <div class="card-body">
                                        <!-- title -->
                                        <div class="d-md-flex align-items-center">
                                            <div>
                                                <h4 class="card-title">List Pegawai</h4>
                                                <h5 class="card-subtitle">Diurutkan dari inputan terbaru</h5>
                                                @if(auth()->user()->role == 'Administrator') 
                                                <a href="/user/create" class="btn btn-success">Tambah Pegawai</a>
                                                @endif
                                            </div>
                                        </div>
                                        <!-- title -->
                                    </div>
                                    <div class="table-responsive">
                                        <div class="table-responsive">
                                        <table class="table v-middle">
                                            <thead>
                                                <tr class="bg-light">
                                                    <th class="border-top-0">Id</th>
                                                    <th class="border-top-0">Nama</th>
                                                    <th class="border-top-0">Level</th>
                                                    <th class="border-top-0">Username</th>
                                                    <th class="border-top-0">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($users as $user)
                                                <tr>
                                                    <td scope="row">{{$user->id}}</td>
                                                    <td>{{$user->name}}</td>
                                                    <td>{{$user->role}}</td>
                                                    <td>{{$user->username}}</td>
                                                    <td>
                                                        <form action="/user/{{$user->id}}" method="post">
                                                            @csrf
                                                            @method('delete')
                                                            <a href="/user/{{$user->id}}" class="btn btn-primary">detail</a>
                                                            @if(auth()->user()->role == 'Administrator') 
                                                            <a href="/user/{{$user->id}}/edit" class="btn btn-warning">edit</a>
                                                            <button type="submit" class="btn btn-danger">hapus</button>
                                                            @endif
                                                        </form>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        {{$users->links()}}
                                    </div>
                                    </div>
                                </div>
                            </div>
@endsection
@extends('layout-dashboard.home')

@section('content')
                            <div class="col-md-12 mt-4">
                                <div class="card">
                                    <div class="card-body">
                                        <!-- title -->
                                        <div class="d-md-flex align-items-center">
                                            <div>
                                                <h4 class="card-title">List Level</h4>
                                                <h5 class="card-subtitle">Diurutkan dari inputan terbaru</h5>
                                                <a href="/petugas/level/create" class="btn btn-success">Tambah Level</a>
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
                                                    <th class="border-top-0">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($levels as $level)
                                                    <tr>
                                                        <td scope="row">{{$level->id}}</td>
                                                        <td>{{$level->name}}</td>
                                                        <td>
                                                        <form action="/petugas/level/{{$level->id}}" method="post">
                                                                @csrf
                                                                @method('delete')
                                                                <a href="/petugas/level/{{$level->id}}" class="btn btn-primary">detail</a>
                                                                <a href="/petugas/level/{{$level->id}}/edit" class="btn btn-warning">edit</a>
                                                                <button type="submit" class="btn btn-danger">hapus</button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        {{$levels->links()}}
                                    </div>
                                </div>
                            </div>
@endsection
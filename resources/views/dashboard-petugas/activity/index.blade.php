@extends('layout-dashboard.home')

@section('content')
<div class="col-md-12 mt-4">
                                <div class="card">
                                    <div class="card-body">
                                        <!-- title -->
                                        <div class="d-md-flex align-items-center">
                                            <div>
                                                <h4 class="card-title">List Logging</h4>
                                                <h5 class="card-subtitle">Diurutkan dari inputan terbaru</h5>
                                            </div>
                                        </div>
                                        <!-- title -->
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table v-middle">
                                            <thead>
                                                <tr class="bg-light">
                                                    <th class="border-top-0">Id</th>
                                                    <th class="border-top-0">Nama Log</th>
                                                    <th class="border-top-0">Deskripsi</th>
                                                    <th class="border-top-0">Data</th>
                                                    <th class="border-top-0">Pada Model</th>
                                                    <th class="border-top-0">Pada Tanggal</th>
                                                </tr>
                                            </thead>
                                            <tbody>
												@foreach($activities as $key => $activity)
                                                <tr>
                                                    <td>{{$activity->id}}</td>
                                                    <td>{{$activity->log_name}}</td>
                                                    <td>{{$activity->description}}</td>
                                                    <td>
                                                        @foreach($activity['properties'] as $perubahan)
                                                        {{$activity['properties']['attributes']['name']}}
                                                        @endforeach
                                                    </td>
                                                    <td>{{$activity->subject_type}}</td>
                                                    <td>{{$activity->created_at->format('d/m/Y')}}</td>
                                                </tr>
												@endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
@endsection
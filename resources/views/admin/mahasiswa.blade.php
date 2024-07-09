@extends('layout.adminpanel')

@section('kontenadmin')
    <!-- ================ Order Details List ================= -->
    <div class="details">
        <div class="recentOrders">
            <div class="cardHeader">
                <h2>Data Mahasiswa</h2>
                <button class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#modal_tambahmhs">Tambah
                    Data</button>
                <button class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#tambah_mhsmasal">Data Masal</button>
            </div>

            <!--@if ($errors->any())
                <div class="my-3">
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif-->

            <table id="example" class="table table-striped table-hover" width = "100%">
                <thead>
                    @empty($user)
                        <div class="alert alert-danger">
                            Data belum tersedia
                        </div>
                    @endempty
                    <tr>
                        <td>No</td>
                        <td>Nama</td>
                        <td>Program Studi</td>
                        <td>NIM</td>
                        <td>E-Mail</td>
                        <td>Langkah</td>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($user as $item)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{ $item->nama_mahasiswa }}</td>
                        <td>{{ $item->prodi_mahasiswa }}</td>
                        <td>{{ $item->nim_mahasiswa }}</td>
                        <td>{{$item->email}}</td>
                        <td>
                            <a href="#edit{{ $item->id }}" data-bs-toggle="modal"
                                class="btn btn-outline-primary">Edit</a>
                            <a href="#delete{{ $item->id }}" data-bs-toggle="modal"
                                class="btn btn-outline-danger">Delete</a>
                        </td>
                        @include('admin.modal.action_mahasiswa')
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @include('admin.modal.create_mahasiswa')
@endsection

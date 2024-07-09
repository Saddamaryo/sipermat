@extends('layout/adminpanel')

@section('kontenadmin')
    <div class="details">
        <div class="recentOrders">
            <div class="cardHeader">
                <h2>Data dan Akun Koordinator Program Studi</h2>
                <!--<button class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#modal_tambahkaprodi">Tambah
                    Data</button>-->
            </div>
            <table id="example" class="table table-striped table-hover" width = "100%">
                <thead>
                    <tr>
                        <td>No</td>
                        <td>Nama Kaprodi</td>
                        <td>NIP Kaprodi</td>
                        <td>Program Studi</td>
                        <td>Langkah</td>
                    </tr>
                </thead>


                <tbody>
                    @foreach ($kaprodi as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->nama_kaprodi }}</td>
                            <td>{{ $item->nip_kaprodi }}</td>
                            <td>{{ $item->prodi_kaprodi }}</td>
                            <td>
                                <a href="#edit{{ $item->id }}" data-bs-toggle="modal"
                                    class="btn btn-outline-primary">Edit</a>
                                <!--<button id="" class="btn btn-outline-danger">Delete</button>-->
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @include('admin.modal.create_kaprodi')
@endsection

@extends('layout/adminpanel')

@section('kontenadmin')
    <div class="details">
        <div class="recentOrders">
            <div class="cardHeader">
                <h2>Data Admin</h2>
                <button class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#modal_tambahadmin">Tambah
                    Data</button>
            </div>

            <!--SECTION MODAL-->

            <table id="example" class="table table-striped table-hover" width = "100%">
                <thead>
                    <tr>
                        <td>No</td>
                        <td>Nama Admin</td>
                        <td>E-Mail</td>
                        <td>Nomor</td>
                        <td>Langkah</td>
                    </tr>
                </thead>
                @empty($dataadmin)
                    <div class="alert alert-danger">
                        Data belum tersedia
                    </div>
                @endempty
                <tbody>
                    @foreach ($dataadmin as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->nama_admin }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->nomor_admin }}</td>
                            <td>
                                <a href="#edit{{ $item->id }}" data-bs-toggle="modal"
                                    class="btn btn-outline-primary">Edit</a>
                                <a href="#delete{{ $item->id }}" data-bs-toggle="modal"
                                    class="btn btn-outline-danger">Delete</a>
                            </td>
                            @include('admin.modal.action_dataadmin')
                        </tr>
                    @endforeach ($dataadmin as $item)

                </tbody>
            </table>
        </div>
    </div>
    @include('admin.modal.create_dataadmin')

    
@endsection

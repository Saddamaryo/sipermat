@extends('layout/adminpanel')

@section('kontenadmin')
    <div class="details">
        <div class="recentOrders">
            <div class="cardHeader">
                <h2>Data Pimpinan</h2>
                <button class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#modal_tambahpimpinan">Tambah
                    Data</button>
            </div>

            @if ($errors->any())
                <div class="my-3">
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif
            <!--SECTION MODAL-->

            <table id="example" class="table table-striped table-hover" width = "100%">
                <thead>
                    <tr>
                        <td>No</td>
                        <td>Nama Pimpinan</td>
                        <td>NIP</td>
                        <td>Jabatan</td>
                        <td>Langkah</td>
                    </tr>
                </thead>
                @empty($pimpinan)
                    <div class="alert alert-danger">
                        Data belum tersedia
                    </div>
                @endempty
                <tbody>
                    @foreach ($pimpinan as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->nama_pimpinan }}</td>
                            <td>{{ $item->nip_pimpinan }}</td>
                            <td>{{ $item->jabatan_pimpinan }}</td>
                            <td>
                                <a href="#edit{{ $item->id }}" data-bs-toggle="modal"
                                    class="btn btn-outline-primary">Edit</a>
                                <a href="#delete{{ $item->id }}" data-bs-toggle="modal"
                                    class="btn btn-outline-danger">Delete</a>
                            </td>
                            @include('admin.modal.action_pimpinan')
                        </tr>
                    @endforeach ($pimpinan as $item)
                </tbody>
            </table>
        </div>
    </div>
    @include('admin.modal.create_pimpinan')
@endsection

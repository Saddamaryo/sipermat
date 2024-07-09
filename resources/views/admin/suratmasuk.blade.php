@extends('layout/adminpanel')

@section('kontenadmin')
    <div class="details">
        <div class="recentOrders">
            <div class="cardHeader">
                <h2>Arsip Surat Masuk</h2>
                <button class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#modal_suratmasuk">Tambah
                    Data</button>
            </div>
            <table id="example" class="table table-striped table-hover" width="100%">
                <thead>
                    <tr>
                        <td>No</td>
                        <td>Nama Pemilik</td>
                        <td>NIM/NIP Pemilik</td>
                        <td>Prodi/Instansi</td>
                        <td>Nama Surat</td>
                        <td>Tanggal Arsip</td>
                        <td>Langkah</td>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($suratmasuk as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->nama_mahasiswa }}</td>
                            <td>{{ $item->nim_mahasiswa }}</td>
                            <td>{{ $item->prodi_mahasiswa }}</td>
                            <td>{{ $item->nama_surat }}</td>
                            <td>{{ $item->created_at->locale('id')->isoFormat('LL') }}</td>
                            <td>
                                <a href="{{ url('downloadfile_suratmasuk', $item->id) }}"
                                    class="btn btn-outline-secondary">Download</a>
                                <a href="#edit{{ $item->id }}" class="btn btn-primary" data-bs-toggle="modal">Edit</a>
                                <a href="#delete{{ $item->id }}" class="btn btn-danger" data-bs-toggle="modal">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @include('admin.modal.create_suratmasuk')
@endsection

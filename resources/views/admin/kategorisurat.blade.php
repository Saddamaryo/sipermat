@extends('layout/adminpanel')

@section('kontenadmin')
    <div class="details">
        <div class="recentOrders">
            <div class="cardHeader">
                <h2>Data & Kategori Surat</h2>
                <!--<button class="btn btn-outline-success" data-bs-toggle="modal"
                    data-bs-target="#modal_tambahkategorisurat">Tambah
                    Data</button>-->
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
                        <td>Nama Surat</td>
                        <td>Nomor Surat</td>
                        <td>Singkatan</td>
                        <td>Deskripsi Surat</td>
                        <td>File Template</td>
                        <td>Langkah</td>
                    </tr>
                </thead>
                @empty($kategorisurat)
                    <div class="alert alert-danger">
                        Data belum tersedia
                    </div>
                @endempty
                <tbody>
                    @foreach ($kategorisurat as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->nama_surat }}</td>
                            <td>{{ $item->nomor }}</td>
                            <td>{{ $item->slug }}</td>
                            <td>{{ $item->deskripsi_surat }}</td>
                            <td>
                                @if ($item->template_surat != null)
                                    <a href="{{ route('download-template', $item->id) }}"
                                        class="btn btn-secondary">Download
                                    </a>
                                @else
                                @endif
                            </td>
                            <td>
                                <a href="#edit{{ $item->id }}" data-bs-toggle="modal"
                                    class="btn btn-outline-primary">Edit</a>
                                <!--<a href="#delete{{ $item->id }}" data-bs-toggle="modal"
                                    class="btn btn-outline-danger">Delete</a>-->
                            </td>
                            @include('admin.modal.action_kategorisurat')
                        </tr>
                    @endforeach ($kategorisurat as $item)
                </tbody>
            </table>
        </div>
    </div>
    @include('admin.modal.create_kategorisurat')
@endsection

@extends('layout.userpanel')

@section('kontenuser')
    <!--MAIN-->
    <main id="content">
        <section class="catalogues">
            <div class="container-sm">
                <div class="text-products row align-items-center">
                    <div class="title-product col text-center">
                        <br>
                        <h3 class="text-main"><strong>Daftar Pengajuan Surat Menyurat Mahasiswa</strong></h3>
                    </div>
                </div>
                <table id="example" class="table table-striped table-hover" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Surat</th>
                            <th>Nama Mahasiswa</th>
                            <th>Nomor Induk Mahasiswa (NIM)</th>
                            <th>Program Studi</th>
                            <th>Status</th>
                            <th>Langkah</th>
                        </tr>
                    </thead>

                    <tbody>

                        @foreach ($pengajuans as $item)
                            <tr>
                                <td> {{ $loop->iteration }}</td>
                                <td>{{ $item->nama_surat }}</td>
                                <td>{{ $item->nama_mahasiswa }}</td>
                                <td>{{ $item->nim_mahasiswa }}</td>
                                <td>{{ $item->prodi_mahasiswa }}</td>
                                @if ($item->status == 'Diproses')
                                    <td><span class="status inProgress">{{ $item->status }}</span></td>
                                @elseif ($item->status == 'Menunggu')
                                    <td><span class="status pending">{{ $item->status }}</span></td>
                                @elseif ($item->status == 'Ditolak')
                                    <td><span class="status return">{{ $item->status }}</span></td>
                                @elseif ($item->status == 'Selesai')
                                    <td><span class="status delivered">{{ $item->status }}</span></td>
                                @endif
                                <td>
                                    <!--<button class="btn btn-outline-danger">Delete</button>-->

                                    @if ($item->status == 'Menunggu')
                                        <a href="#delete_pengajuan{{ $item->id }}" data-bs-toggle="modal"
                                            class="btn btn-outline-danger">Delete</a>
                                        <a href="#update_pengajuan{{ $item->id }}" data-bs-toggle="modal"
                                            class="btn btn-outline-success">Edit</a>
                                        @if ($item->slug == 's-lain')
                                        @else
                                            <a href="{{ url('previewsurat', $item->id) }}"
                                                class="btn btn-outline-secondary preview-link"
                                                data-id="{{ $item->id }}">Preview</a>
                                        @endif
                                    @elseif($item->status == 'Ditolak')
                                        <a href="#delete_pengajuan{{ $item->id }}" data-bs-toggle="modal"
                                            class="btn btn-outline-danger">Delete</a>
                                        <a href="#update_pengajuan{{ $item->id }}" data-bs-toggle="modal"
                                            class="btn btn-outline-success">Edit</a>
                                        @if ($item->slug == 's-lain')
                                        @else
                                            <a href="{{ url('previewsurat', $item->id) }}"
                                                class="btn btn-outline-secondary preview-link"
                                                data-id="{{ $item->id }}">Preview</a>
                                        @endif
                                    @else
                                    @endif


                                </td>
                            </tr>
                        @endforeach

                    </tbody>

                </table>
            </div>
        </section>


    </main>
    <br>
    <br>

    @if ($pengajuansurattugas->isEmpty())
    @else
        <main id="content">
            <section class="catalogues">
                <div class="container-sm">
                    <div class="text-products row align-items-center">
                        <div class="title-product col text-center">
                            <h3 class="text-main"><strong>Daftar Pengajuan Surat Tugas Mahasiswa</strong></h3>
                        </div>
                    </div>
                    <table id="example1" class="table table-striped table-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Surat</th>
                                <th>Nama Mahasiswa</th>
                                <th>Nomor Induk Mahasiswa (NIM)</th>
                                <th>Program Studi</th>
                                <th>Status</th>
                                <th>Langkah</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($pengajuansurattugas as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->nama_surat }}</td>
                                    <td>{{ $item->nama_mahasiswa }}</td>
                                    <td>{{ $item->nim_mahasiswa }}</td>
                                    <td>{{ $item->prodi_mahasiswa }}</td>
                                    @if ($item->status == 'Diproses')
                                        <td><span class="status inProgress">{{ $item->status }}</span></td>
                                    @elseif ($item->status == 'Menunggu')
                                        <td><span class="status pending">{{ $item->status }}</span></td>
                                    @elseif ($item->status == 'Ditolak')
                                        <td><span class="status return">{{ $item->status }}</span></td>
                                    @elseif ($item->status == 'Selesai')
                                        <td><span class="status delivered">{{ $item->status }}</span></td>
                                    @endif
                                    <td>
                                        @if ($item->status == 'Menunggu')
                                            <a href="#delete_pengajuantugas{{ $item->id }}" data-bs-toggle="modal"
                                                class="btn btn-outline-danger">Delete</a>
                                            <a href="#update_pengajuantugas{{ $item->id }}" data-bs-toggle="modal"
                                                class="btn btn-outline-success">Edit</a>
                                            @if ($item->slug == 's-laintugas')
                                            @else
                                                <a href="{{ url('previewsurattugas', $item->id) }}"
                                                    class="btn btn-outline-secondary preview-link"
                                                    data-id="{{ $item->id }}">Preview</a>
                                            @endif
                                        @elseif ($item->status == 'Ditolak')
                                            <a href="#delete_pengajuantugas{{ $item->id }}" data-bs-toggle="modal"
                                                class="btn btn-outline-danger">Delete</a>
                                            <a href="#update_pengajuantugas{{ $item->id }}" data-bs-toggle="modal"
                                                class="btn btn-outline-success">Edit</a>
                                            @if ($item->slug == 's-laintugas')
                                            @else
                                                <a href="{{ url('previewsurattugas', $item->id) }}"
                                                    class="btn btn-outline-secondary preview-link"
                                                    data-id="{{ $item->id }}">Preview</a>
                                            @endif
                                        @else
                                        @endif
                                        @include('user.modal.action_suratmhs')
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </section>
        </main>
    @endif

    <br>
    <br>



    @include('user.modal.action_suratmhs')

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.preview-link').forEach(function(link) {
                link.addEventListener('click', function(event) {
                    event.preventDefault();
                    const url = this.href;
                    window.open(url, '_blank');
                });
            });
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.preview-link').forEach(function(link) {
                link.addEventListener('click', function(event) {
                    event.preventDefault();
                    const url = this.href;
                    window.open(url, '_blank');
                });
            });
        });
    </script>


@endsection

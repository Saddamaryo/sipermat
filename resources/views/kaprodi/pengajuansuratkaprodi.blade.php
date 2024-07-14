@extends('layout/kaprodipanel')

@section('kontenkaprodi')
    <div class="details">
        <div class="recentOrders">
            <div class="cardHeader">
                <h2>Pengajuan Surat Menyurat Mahasiswa</h2>
            </div>

            <table id="example" class="table table-striped table-hover" width = "100%">
                <thead>
                    <tr>
                        <td>No</td>
                        <td>Nama Mahasiswa</td>
                        <td>Nama Surat</td>
                        <td>NIM</td>
                        <td>Prodi</td>
                        <td>Status</td>
                        <td>Langkah</td>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($counts as $item)
                        @if ($item->status == 'Diproses')
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->nama_mahasiswa }}</td>
                                <td>{{ $item->nama_surat }}</td>
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
                                    <button class="btn btn-secondary" data-bs-target="#accepting{{ $item->id }}"
                                        data-bs-toggle="modal">View</button>
                                    @if ($item->prodi_mahasiswa == 'Ilmu Komputer')
                                        <a class="btn btn-primary preview-link"
                                            href="{{ url('kaprodi/preview', [$item->id, 'Ilmu Komputer']) }}">
                                            <i class="bi bi-file-earmark-text">Preview</i>
                                        </a>
                                    @elseif ($item->prodi_mahasiswa == 'Pendidikan Matematika')
                                        <a class="btn btn-primary preview-link"
                                            href="{{ url('kaprodi/preview', [$item->id, 'Pendidikan Matematika']) }}">
                                            <i class="bi bi-file-earmark-text">Preview</i>
                                        </a>
                                    @elseif($item->prodi_mahasiswa == 'Statistika')
                                        <a class="btn btn-primary preview-link"
                                            href="{{ url('kaprodi/preview', [$item->id, 'Statistika']) }}">
                                            <i class="bi bi-file-earmark-text">Preview</i>
                                        </a>
                                    @else
                                        <a class="btn btn-primary preview-link"
                                            href="{{ url('kaprodi/preview', [$item->id, 'Matematika']) }}">
                                            <i class="bi bi-file-earmark-text">Preview</i>
                                        </a>
                                    @endif
                                </td>
                            </tr>
                        @else
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>


    @if ($pengajuansurattugas->isEmpty())
    @else
        <div class="details">
            <div class="recentOrders">
                <div class="cardHeader">
                    <h2>Pengajuan Surat Tugas Mahasiswa</h2>
                </div>

                <table id="example1" class="table table-striped table-hover" width = "100%">
                    <thead>
                        <tr>
                            <td>No</td>
                            <td>Nama Mahasiswa</td>
                            <td>Nama Surat</td>
                            <td>NIM</td>
                            <td>Prodi</td>
                            <td>Status</td>
                            <td>Langkah</td>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($pengajuansurattugas as $item)
                            @if ($item->status == 'Diproses')
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->nama_mahasiswa }}</td>
                                    <td>{{ $item->nama_surat }}</td>
                                    <td>{{ $item->nim_mahasiswa }}</td>
                                    <td>{{ $item->prodi_mahasiswa }}</td>
                                    <td><span class="status inProgress">{{ $item->status }}</span></td>
                                    <td>
                                        <button class="btn btn-secondary"
                                            data-bs-target="#accepting_tugas{{ $item->id }}"
                                            data-bs-toggle="modal">View</button>\
                                        <a class="btn btn-primary preview-link"
                                            href="{{ url('kaprodi/previewtugas', $item->id) }}">Preview</a>
                                    </td>
                                </tr>
                            @else
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
    @include('kaprodi.modal.accpengajuansurat')
@endsection

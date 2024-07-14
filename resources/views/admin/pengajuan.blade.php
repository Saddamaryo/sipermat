@extends('layout/adminpanel')

@section('kontenadmin')
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
                        <td>Tanggal Diajukan</td>
                        <td>Status</td>
                        <td>Langkah</td>
                    </tr>
                </thead>


                <tbody>
                    @foreach ($pengajuansurat as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->nama_mahasiswa }}</td>
                            <td>{{ $item->nama_surat }}</td>
                            <td>{{ $item->nim_mahasiswa }}</td>
                            <td>{{ $item->prodi_mahasiswa }}</td>
                            <td>{{ $item->created_at->locale('id')->isoFormat('LL') }}</td>
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
                                @if ($item->nomor_urut == null)
                                    <button class="btn btn-secondary" data-bs-target="#view{{ $item->id }}"
                                        data-bs-toggle="modal">
                                        Buat nomor
                                    </button>
                                @else
                                    <div id="mainButtons-{{ $item->id }}">
                                        <button class="btn btn-secondary" data-bs-target="#view{{ $item->id }}"
                                            data-bs-toggle="modal">
                                            <i class="bi bi-eye"></i> View
                                        </button>
                                        <button class="btn btn-primary"
                                            onclick="showAdditionalButtons({{ $item->id }})">
                                            <i class="bi bi-chevron-down"></i> More
                                        </button>
                                    </div>
                                    <div id="additionalButtons-{{ $item->id }}" style="display: none;">
                                        @if ($item->status == 'Menunggu')
                                            <button class="btn btn-outline-danger"
                                                data-bs-target="#delete{{ $item->id }}" data-bs-toggle="modal">
                                                <i class="bi bi-trash">Delete</i>
                                            </button>
                                            <button class="btn btn-danger" type="button"
                                                data-bs-target="#rejectsuratmhs{{ $item->id }}" data-bs-toggle="modal">
                                                <i class="bi bi-x-circle">Tolak</i>
                                            </button>
                                            <button class="btn btn-info" data-bs-target="#uploadmanual{{ $item->id }}"
                                                data-bs-toggle="modal">
                                                <i class="bi bi-cloud-upload">Upload Manual</i>
                                            </button>
                                            @if ($item->slug != 's-lain')
                                                @if ($item->prodi_mahasiswa == 'Ilmu Komputer')
                                                    <a class="btn btn-primary preview-link"
                                                        href="{{ url('preview', [$item->id, 'Ilmu Komputer']) }}">
                                                        <i class="bi bi-file-earmark-text">Preview</i>
                                                    </a>
                                                @elseif ($item->prodi_mahasiswa == 'Pendidikan Matematika')
                                                    <a class="btn btn-primary preview-link"
                                                        href="{{ url('preview', [$item->id, 'Pendidikan Matematika']) }}">
                                                        <i class="bi bi-file-earmark-text">Preview</i>
                                                    </a>
                                                @elseif($item->prodi_mahasiswa == 'Statistika')
                                                    <a class="btn btn-primary preview-link"
                                                        href="{{ url('preview', [$item->id, 'Statistika']) }}">
                                                        <i class="bi bi-file-earmark-text">Preview</i>
                                                    </a>
                                                @else
                                                    <a class="btn btn-primary preview-link"
                                                        href="{{ url('preview', [$item->id, 'Matematika']) }}">
                                                        <i class="bi bi-file-earmark-text">Preview</i>
                                                    </a>
                                                @endif
                                            @else
                                            @endif


                                            @if ($item->file_ajuan != null)
                                                <a href="{{ url('downloadfile_ajuan', $item->id) }}"
                                                    class="btn btn-outline-secondary">
                                                    <i class="bi bi-cloud-download">Download</i>
                                                </a>
                                            @endif
                                        @elseif($item->status == 'Ditolak')
                                            <button class="btn btn-info" data-bs-target="#uploadmanual{{ $item->id }}"
                                                data-bs-toggle="modal">
                                                <i class="bi bi-cloud-upload">Upload Manual</i>
                                            </button>
                                            <button class="btn btn-outline-danger"
                                                data-bs-target="#delete{{ $item->id }}" data-bs-toggle="modal">
                                                <i class="bi bi-trash"></i> Delete
                                            </button>
                                            @if ($item->file_ajuan != null)
                                                <a href="{{ url('downloadfile_ajuan', $item->id) }}"
                                                    class="btn btn-outline-secondary">
                                                    <i class="bi bi-cloud-download">Download</i>
                                                </a>
                                            @endif
                                        @endif
                                        <button class="btn btn-primary"
                                            onclick="hideAdditionalButtons({{ $item->id }})">
                                            <i class="bi bi-chevron-up"></i> Less
                                        </button>
                                    </div>
                                @endif
                            </td>
                        </tr>
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
                            <td>Tanggal Diajukan</td>
                            <td>Status</td>
                            <td>Langkah</td>
                        </tr>
                    </thead>


                    <tbody>
                        @foreach ($pengajuansurattugas as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->nama_mahasiswa }}</td>
                                <td>{{ $item->nama_surat }}</td>
                                <td>{{ $item->nim_mahasiswa }}</td>
                                <td>{{ $item->prodi_mahasiswa }}</td>
                                <td>{{ $item->created_at->locale('id')->isoFormat('LL') }}</td>
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
                                    @if ($item->nomor_urut == null)
                                        <button class="btn btn-secondary" data-bs-target="#viewtugas{{ $item->id }}"
                                            data-bs-toggle="modal">View</button>
                                    @else
                                        @if ($item->status == 'Diproses')
                                            <button class="btn btn-secondary"
                                                data-bs-target="#viewtugas{{ $item->id }}"
                                                data-bs-toggle="modal">View</button>
                                        @elseif ($item->status == 'Menunggu')
                                            <div id="mainButtons-{{ $item->id }}">
                                                <button class="btn btn-secondary"
                                                    data-bs-target="#viewtugas{{ $item->id }}" data-bs-toggle="modal">
                                                    <i class="bi bi-eye"></i> View
                                                </button>
                                                <button class="btn btn-primary"
                                                    onclick="showAdditionalButtons({{ $item->id }})">
                                                    <i class="bi bi-chevron-down"></i> More
                                                </button>
                                            </div>
                                            <div id="additionalButtons-{{ $item->id }}" style="display: none;">
                                                @if ($item->slug == 's-skrip')
                                                    <button class="btn btn-secondary"
                                                        data-bs-target="#viewtugas{{ $item->id }}"
                                                        data-bs-toggle="modal">View</button>
                                                    <button data-bs-target="#delete_tugas{{ $item->id }}"
                                                        data-bs-toggle="modal"
                                                        class="btn btn-outline-danger">Delete</button>
                                                    <button class="btn btn-danger" type="button"
                                                        data-bs-target="#rejectsurattugas{{ $item->id }}"
                                                        data-bs-toggle="modal">Tolak</button>
                                                    <button class="btn btn-info"
                                                        data-bs-target="#uploadmanual_tugas{{ $item->id }}"
                                                        data-bs-toggle="modal">Upload Manual</button>
                                                    @if ($item->prodi_mahasiswa == 'Ilmu Komputer')
                                                        <a class="btn btn-primary preview-link"
                                                            href="{{ url('previewilkomtugas', $item->id) }}">Preview</a>
                                                    @elseif ($item->prodi_mahasiswa == 'Pendidikan Matematika')
                                                        <a class="btn btn-primary preview-link"
                                                            href="{{ url('previewpenmattugas', $item->id) }}">Preview</a>
                                                    @elseif($item->prodi_mahasiswa == 'Statistika')
                                                        <a class="btn btn-primary preview-link"
                                                            href="{{ url('previewstattugas', $item->id) }}">Preview</a>
                                                    @else
                                                        <a class="btn btn-primary preview-link"
                                                            href="{{ url('previewmattugas', $item->id) }}">Preview</a>
                                                    @endif
                                                @else
                                                    <button data-bs-target="#delete_tugas{{ $item->id }}"
                                                        data-bs-toggle="modal"
                                                        class="btn btn-outline-danger">Delete</button>
                                                    <button class="btn btn-danger" type="button"
                                                        data-bs-target="#rejectsurattugas{{ $item->id }}"
                                                        data-bs-toggle="modal">Tolak</button>
                                                    <button class="btn btn-info"
                                                        data-bs-target="#uploadmanual_tugas{{ $item->id }}"
                                                        data-bs-toggle="modal">Upload Manual</button>
                                                @endif
                                                @if ($item->file_ajuan != null)
                                                    <a href="{{ url('downloadfile_ajuantugas', $item->id) }}"
                                                        class="btn btn-outline-secondary">Download
                                                        File</a>
                                                @else
                                                @endif
                                                <button class="btn btn-primary"
                                                    onclick="hideAdditionalButtons({{ $item->id }})">
                                                    <i class="bi bi-chevron-up"></i> Less
                                                </button>
                                            @elseif($item->status == 'Ditolak')
                                                <button class="btn btn-secondary"
                                                    data-bs-target="#viewtugas{{ $item->id }}"
                                                    data-bs-toggle="modal">View</button>
                                                <button class="btn btn-info"
                                                    data-bs-target="#uploadmanual_tugas{{ $item->id }}"
                                                    data-bs-toggle="modal">Upload Manual</button>
                                                <button data-bs-target="#delete_tugas{{ $item->id }}"
                                                    data-bs-toggle="modal" class="btn btn-outline-danger">Delete</button>

                                                @if ($item->file_ajuan != null)
                                                    <a href="{{ url('downloadfile_ajuan', $item->id) }}"
                                                        class="btn btn-outline-secondary">Download
                                                        File</a>
                                                @else
                                                @endif
                                        @endif
            </div>
    @endif


    </td>
    </tr>
    @endforeach


    </tbody>

    </table>
    </div>
    </div>
    @endif
    @include('admin.modal.action_pengajuan')
    @include('admin.modal.delete&reject_datapengajuan')
    @include('admin.modal.edit_pengajuan')

@endsection

@extends('layout/adminpanel')

@section('kontenadmin')
    <div class="details">
        <div class="recentOrders">
            <div class="cardHeader">
                <h2>Arsip Surat Tugas Mahasiswa</h2>
                <button class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#Tambaharsipsurattugas">Tambah
                    Data</button>
            </div>
            <table id="example" class="table table-striped table-hover" width="100%">
                <thead>
                    <tr>
                        <td>No</td>
                        <td>Nama Pengaju</td>
                        <td>NIM</td>
                        <td>Program Studi</td>
                        <td>Nama Surat</td>
                        <td>Nomor Surat</td>
                        <td>Tanggal Disahkan</td>
                        <td>Status</td>
                        <td>Langkah</td>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($pengarsipansurattugas as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->nama_mahasiswa }}</td>
                            <td>{{ $item->nim_mahasiswa }}</td>
                            <td>{{ $item->prodi_mahasiswa }}</td>
                            <td>{{ $item->nama_surat }}</td>
                            <td>{{ $item->nomor_urut }}{{ $item->nomor_surat }}</td>
                            <td>{{ $item->updated_at->locale('id')->isoFormat('LL') }}</td>
                            @if ($item->status == 'Diproses')
                            <td><span class="status inProgress">{{ $item->status }}</span></td>
                            @elseif ($item->status == 'Menunggu')
                            <td><span class="status pending">{{ $item->status }}</span></td>
                            @elseif ($item->status == 'Ditolak')
                            <td><span class="status return">{{ $item->status }}</span></td>
                            @elseif ($item->status == 'Selesai')
                            <td><span class="status delivered">{{ $item->status }}</span></td>
                            @elseif ($item->status == 'Arsip')
                            <td><span class="status delivered">{{ $item->status }}</span></td>
                            @endif
                            <td>
                                @if ($item->status == 'Selesai')
                                    @if ($item->file_acc == null)
                                        @if ($item->prodi_mahasiswa == 'Pendidikan Matematika')
                                            <a href="{{ url('exporttugaspenmat', $item->id) }}"
                                                class="btn btn-outline-primary preview-link" >Download</a>
                                        @elseif ($item->prodi_mahasiswa == 'Ilmu Komputer')
                                            <a href="{{ url('exporttugasilkom', $item->id) }}"
                                                class="btn btn-outline-primary preview-link" >Download</a>
                                        @elseif ($item->prodi_mahasiswa == 'Statistika')
                                            <a href="{{ url('exporttugasstat', $item->id) }}"
                                                class="btn btn-outline-primary preview-link" >Download</a>
                                        @elseif ($item->prodi_mahasiswa == 'Matematika')
                                            <a href="{{ url('exporttugasmat', $item->id) }}"
                                                class="btn btn-outline-primary preview-link">Download</a>
                                        @endif
                                    @else
                                        <a href="{{ url('downloadfile_admintugas', $item->id) }}"
                                            class="btn btn-outline-primary">Download</a>
                                    @endif
                                @else
                                    @if ($item->status == 'Arsip')
                                        @if ($item->file_acc != null)
                                            <a href="{{ url('downloadfile_admintugas', $item->id) }}"
                                                class="btn btn-outline-primary">Download</a>
                                                <a href="#deletearsipsurattugas{{ $item->id }}" data-bs-toggle="modal"
                                                    class="btn btn-outline-danger">Delete</a>
                                        @else
                                        @endif
                                    @else
                                    @endif
                                @endif



                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @include('admin.modal.create&action_arsipsurattugas')
@endsection

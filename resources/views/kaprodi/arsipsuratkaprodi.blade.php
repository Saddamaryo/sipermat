@extends('layout/kaprodipanel')

@section('kontenkaprodi')
    <div class="details">
        <div class="recentOrders">
            <div class="cardHeader">
                <h2>Arsip Surat Menyurat Mahasiswa</h2>
            </div>

            <table id="example" class="table table-striped table-hover" width = "100%">
                <thead>
                    <tr>
                        <td>No</td>
                        <td>Nama Mahasiswa</td>
                        <td>Nama Surat</td>
                        <td>NIM</td>
                        <td>Prodi</td>
                        <td>Tanggal Disahkan</td>
                        <td>Status</td>
                        <td>Langkah</td>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($counts as $item)
                        @if ($item->status == 'Selesai')
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->nama_mahasiswa }}</td>
                                <td>{{ $item->nama_surat }}</td>
                                <td>{{ $item->nim_mahasiswa }}</td>
                                <td>{{ $item->prodi_mahasiswa }}</td>
                                <td>{{ $item->updated_at->locale('id')->isoFormat('LL') }}</td>
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
                                    @if ($item->file_acc == null)
                                        @if ($item->prodi_mahasiswa == 'Pendidikan Matematika')
                                            <a href="{{ url('kaprodi/cekexport', $item->id) }}"
                                                class="btn btn-outline-secondary" target="_blank">Download</a>
                                        @elseif ($item->prodi_mahasiswa == 'Ilmu Komputer')
                                            <a href="{{ url('kaprodi/cekexport', $item->id) }}"
                                                class="btn btn-outline-secondary" target="_blank">Download</a>
                                        @elseif ($item->prodi_mahasiswa == 'Statistika')
                                            <a href="{{ url('kaprodi/cekexport', $item->id) }}"
                                                class="btn btn-outline-secondary" target="_blank">Download</a>
                                        @elseif ($item->prodi_mahasiswa == 'Matematika')
                                            <a href="{{ url('kaprodi/cekexport', $item->id) }}"
                                                class="btn btn-outline-secondary" target="_blank">Download</a>
                                        @endif
                                    @else
                                        <a href="{{ route('downloadfile_kaprodi', $item->id) }}"
                                            class="btn btn-secondary">Download File</a>
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
    @include('kaprodi.modal.accpengajuansurat')
@endsection

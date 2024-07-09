@extends('layout.userpanel')

@section('kontenuser')
    <!--MAIN-->
    <main>
        <section class="catalogues">
            <div class="container-sm">
                <div class="text-products row align-items-center">
                    <div class="title-product col text-center">
                        <br>
                        <h3 class="text-main"><strong>Riwayat Pengajuan Surat Menyurat Mahasiswa</strong></h3>
                    </div>
                </div>
                <table id="example" class="table table-striped table-hover" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Mahasiswa</th>
                            <th>Nama Surat</th>
                            <th>NIM</th>
                            <th>Program Studi</th>
                            <th>Tanggal Disahkan</th>
                            <th>Status</th>
                            <th>Langkah</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($arsips as $item)
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
                                        <a href="{{ url('exportpdf', $item->id) }}" class="btn btn-outline-secondary preview-link"
                                           >Download</a>
                                    @else
                                        <a href="{{ url('downloadfile', $item->id) }}" class="btn btn-secondary">Download</a>
                                    @endif



                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </section>
    </main>

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

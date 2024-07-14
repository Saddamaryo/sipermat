@foreach ($counts as $item)
    <div class="modal fade" id="accepting{{ $item->id }}" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-success text-white">
                    <h5 class="modal-title" id="exampleModalLabel">Pengajuan {{ $item->nama_surat }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="modal-body">
                        <form action="{{ url('accepting/' . $item->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="status" value="Selesai" id="status">
                            <div class="mb-3">
                                <label for="" class="col-form-label">Nama Lengkap
                                    {{ $item->nama_mahasiswa }}</label>
                            </div>
                            <div class="mb-3">
                                <label for="" class="col-form-label">Program Studi:
                                    {{ $item->prodi_mahasiswa }}</label>

                            </div>
                            <div class="mb-3">
                                <label for="" class="col-form-label">Nomor Induk Mahasiswa(NIM):
                                    {{ $item->nim_mahasiswa }}</label>

                            </div>
                            <div class="mb-3">
                                <label for="" class="col-form-label">Nomor Handphone Mahasiswa:
                                    {{ $item->nomor_user }}</label>

                            </div>

                            @if ($item->slug == 's-pd')
                                <div class="mb-3">
                                    <label for="r" class="col-form-label">Instansi/Tempat Tujuan:
                                        {{ $item->formulir1 }}</label>
                                </div>

                                <div class="mb-3">
                                    <label for="r" class="col-form-label">Alamat Instansi/Tempat Tujuan:
                                        {{ $item->formulir2 }}</label>
                                </div>

                                <div class="mb-3">
                                    <label for="r" class="col-form-label">Waktu Pelaksanaan:
                                        {{ $item->formulir3 }}</label>
                                </div>

                                <div class="mb-3">
                                    <label for="r" class="col-form-label">Data yang Diperlukan:
                                        {{ $item->formulir4 }}</label>
                                </div>
                            @elseif($item->slug == 's-pol')
                                <div class="mb-3">
                                    <label for="r" class="col-form-label">Waktu Pelaksanaan Observasi:
                                        {{ $item->formulir1 }}</label>
                                </div>
                                <div class="mb-3">
                                    <label for="r" class="col-form-label">Tempat Pelaksanaan Observasi:
                                        {{ $item->formulir2 }}</label>
                                </div>
                                <div class="mb-3">
                                    <label for="r" class="col-form-label">Alamat Tempat Pelaksanaan
                                        Observasi: {{ $item->formulir3 }}</label>
                                </div>
                                <div class="mb-3">
                                    <label for="r" class="col-form-label">Alasan Keperluan Observasi:
                                        {{ $item->formulir4 }}</label>
                                </div>
                            @elseif($item->slug == 's-trans')
                                <div class="mb-3">
                                    <label for="r" class="col-form-label">E-Mail Mahasiswa :
                                        {{ $item->formulir1 }}</label>
                                </div>
                                <div class="mb-3">
                                    <label for="r" class="col-form-label">Alasan Pengajuan Surat Transkrip
                                        Nilai : {{ $item->formulir2 }}</label>
                                </div>
                            @elseif($item->slug == 's-pkl')
                                <div class="mb-3">
                                    <label for="r" class="col-form-label">Tempat Pelaksanaan Praktik Kerja
                                        Lapangan
                                        (PKL)
                                        : {{ $item->formulir1 }}</label>
                                </div>

                                <div class="mb-3">
                                    <label for="r" class="col-form-label">Alamat Tempat Pelaksanaan Praktik
                                        Kerja
                                        Lapangan (PKL) : {{ $item->formulir2 }}</label>
                                </div>

                                <div class="mb-3">
                                    <label for="r" class="col-form-label">Periode Pelaksanaan Praktik Kerja
                                        Lapangan (PKL) : {{ $item->formulir3 }}</label>
                                </div>
                            @elseif($item->slug == 's-kkl')
                                <div class="mb-3">
                                    <label for="r" class="col-form-label">Tempat Pelaksanaan Kuliah Kerja
                                        Lapangan
                                        (KKL) : {{ $item->formulir1 }}</label>
                                </div>

                                <div class="mb-3">
                                    <label for="r" class="col-form-label">Alamat Tempat Pelaksanaan Kuliah
                                        Kerja
                                        Lapangan (KKL) : {{ $item->formulir2 }}</label>
                                </div>

                                <div class="mb-3">
                                    <label for="r" class="col-form-label">Periode Pelaksanaan Kuliah Kerja
                                        Lapangan
                                        (KKL) : {{ $item->formulir3 }}</label>
                                </div>
                            @elseif($item->slug == 's-pkm')
                                <div class="mb-3">
                                    <label for="r" class="col-form-label">Tempat Pelaksanaan Praktik Kegiatan
                                        Mengajar (PKM) : {{ $item->formulir1 }}</label>
                                </div>

                                <div class="mb-3">
                                    <label for="r" class="col-form-label">Alamat Tempat Pelaksanaan Praktik
                                        Kegiatan Mengajar (PKM) : {{ $item->formulir2 }}</label>
                                </div>

                                <div class="mb-3">
                                    <label for="r" class="col-form-label">Periode Pelaksanaan Praktik Kegiatan
                                        Mengajar (PKM) : {{ $item->formulir3 }}</label>
                                </div>
                            @elseif($item->slug == 's-pen')
                                <div class="mb-3">
                                    <label for="r" class="col-form-label">Waktu Pelaksanaan Penelitian :
                                        {{ $item->formulir1 }}</label>
                                </div>
                                <div class="mb-3">
                                    <label for="r" class="col-form-label">Tempat Pelaksanaan Penelitian :
                                        {{ $item->formulir2 }}</label>
                                </div>
                                <div class="mb-3">
                                    <label for="r" class="col-form-label">Alamat Tempat Pelaksanaan Penelitian
                                        :
                                        {{ $item->formulir3 }}</label>
                                </div>
                                <div class="mb-3">
                                    <label for="r" class="col-form-label">Alasan Keperluan Penelitian :
                                        {{ $item->formulir4 }}</label>
                                </div>
                            @elseif($item->slug == 's-rekom')
                                <div class="mb-3">
                                    <label for="r" class="col-form-label">Alasan Pengajuan Rekomendasi :
                                        {{ $item->formulir1 }}</label>
                                </div>
                                <div class="mb-3">
                                    <label for="r" class="col-form-label">Keterangan Rekomendasi :
                                        {{ $item->formulir2 }}</label>
                                </div>
                            @elseif($item->slug == 's-km')
                                <div class="mb-3">
                                    <label for="r" class="col-form-label">Keperluan Pengajuan Surat Keterangan
                                        Mahasiswa : {{ $item->formulir1 }}</label>
                                </div>
                            @elseif($item->slug == 's-pratrans')
                                <div class="mb-3">
                                    <label for="r" class="col-form-label">E-Mail Mahasiswa :
                                        {{ $item->formulir1 }}</label>
                                </div>
                                <div class="mb-3">
                                    <label for="r" class="col-form-label">Alasan Pengajuan Surat Transkrip
                                        Nilai : {{ $item->formulir2 }}</label>
                                </div>
                            @elseif($item->slug == 's-lain')
                                <div class="mb-3">
                                    <label for="r" class="col-form-label">E-Mail Mahasiswa :
                                        {{ $item->formulir1 }}</label>
                                </div>
                                <div class="mb-3">
                                    <label for="r" class="col-form-label">Surat yang Ingin Diajukan :
                                        {{ $item->formulir2 }}"></label>
                                </div>
                                <div class="mb-3">
                                    <label for="r" class="col-form-label">Kebutuhan Pengajuan Surat :
                                        {{ $item->formulir3 }}</label>
                                </div>
                            @endif

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-danger"
                            data-bs-target="#rejectsuratmahasiswa{{ $item->id }}"
                            data-bs-toggle="modal">Reject</button>
                        <button type="submit" class="btn btn-outline-primary">Accept</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endforeach

@foreach ($pengajuansurattugas as $item)
    <div class="modal fade" id="accepting_tugas{{ $item->id }}" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-success text-white">
                    <h5 class="modal-title" id="exampleModalLabel">Pengajuan {{ $item->nama_surat }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="modal-body">
                        <form action="{{ url('accepting_tugas/' . $item->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="status" value="Selesai" id="status">
                            <div class="mb-3">
                                <label for="" class="col-form-label">Nama Lengkap
                                    {{ $item->nama_mahasiswa }}</label>
                            </div>
                            <div class="mb-3">
                                <label for="" class="col-form-label">Program Studi:
                                    {{ $item->prodi_mahasiswa }}</label>

                            </div>
                            <div class="mb-3">
                                <label for="" class="col-form-label">Nomor Induk Mahasiswa(NIM):
                                    {{ $item->nim_mahasiswa }}</label>

                            </div>
                            <div class="mb-3">
                                <label for="" class="col-form-label">Nomor Handphone Mahasiswa:
                                    {{ $item->nomor_user }}</label>

                            </div>

                            @if ($item->slug == 's-skrip')

                            @else 


                            @endif

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-danger"
                            data-bs-target="#rejectsurattugas{{ $item->id }}"
                            data-bs-toggle="modal">Reject</button>
                        <button type="submit" class="btn btn-outline-primary">Accept</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endforeach

@foreach ($counts as $item)
    <div class="modal fade" id="rejectsuratmahasiswa{{ $item->id }}" aria-hidden="true"
        aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h1 class="modal-title fs-5" id="exampleModalToggleLabel2">Reject Pengajuan Surat</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('rejecting_kaprodi/' . $item->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="status" value="Ditolak" id="status">
                        <div class="mb-3">
                            <label for="" class="col-form-label">Nama Lengkap :
                                {{ $item->nama_mahasiswa }}</label>
                        </div>
                        <div class="mb-3">
                            <label for="" class="col-form-label">Program Studi :
                                {{ $item->prodi_mahasiswa }}</label>
                        </div>
                        <div class="mb-3">
                            <label for="" class="col-form-label">Nomor Induk Mahasiswa(NIM) :
                                {{ $item->nim_mahasiswa }}</label>
                        </div>
                        <div class="mb-3">
                            <label for="" class="col-form-label">Nomor Handphone Mahasiswa :
                                {{ $item->nomor_user }}</label>
                        </div>

                        @if ($item->slug == 's-pd')
                            <div class="mb-3">
                                <label for="r" class="col-form-label">Instansi/Tempat Tujuan:
                                    {{ $item->formulir1 }}</label>
                            </div>

                            <div class="mb-3">
                                <label for="r" class="col-form-label">Alamat Instansi/Tempat Tujuan:
                                    {{ $item->formulir2 }}</label>
                            </div>

                            <div class="mb-3">
                                <label for="r" class="col-form-label">Waktu Pelaksanaan:
                                    {{ $item->formulir3 }}</label>
                            </div>

                            <div class="mb-3">
                                <label for="r" class="col-form-label">Data yang Diperlukan:
                                    {{ $item->formulir4 }}</label>
                            </div>
                        @elseif($item->slug == 's-pol')
                            <div class="mb-3">
                                <label for="r" class="col-form-label">Waktu Pelaksanaan Observasi:
                                    {{ $item->formulir1 }}</label>
                            </div>
                            <div class="mb-3">
                                <label for="r" class="col-form-label">Tempat Pelaksanaan Observasi:
                                    {{ $item->formulir2 }}</label>
                            </div>
                            <div class="mb-3">
                                <label for="r" class="col-form-label">Alamat Tempat Pelaksanaan
                                    Observasi: {{ $item->formulir3 }}</label>
                            </div>
                            <div class="mb-3">
                                <label for="r" class="col-form-label">Alasan Keperluan Observasi:
                                    {{ $item->formulir4 }}</label>
                            </div>
                        @elseif($item->slug == 's-trans')
                            <div class="mb-3">
                                <label for="r" class="col-form-label">E-Mail Mahasiswa :
                                    {{ $item->formulir1 }}</label>
                            </div>
                            <div class="mb-3">
                                <label for="r" class="col-form-label">Alasan Pengajuan Surat Transkrip
                                    Nilai : {{ $item->formulir2 }}</label>
                            </div>
                        @elseif($item->slug == 's-pkl')
                            <div class="mb-3">
                                <label for="r" class="col-form-label">Tempat Pelaksanaan Praktik Kerja Lapangan
                                    (PKL)
                                    : {{ $item->formulir1 }}</label>
                            </div>

                            <div class="mb-3">
                                <label for="r" class="col-form-label">Alamat Tempat Pelaksanaan Praktik Kerja
                                    Lapangan (PKL) : {{ $item->formulir2 }}</label>
                            </div>

                            <div class="mb-3">
                                <label for="r" class="col-form-label">Periode Pelaksanaan Praktik Kerja
                                    Lapangan (PKL) : {{ $item->formulir3 }}</label>
                            </div>
                        @elseif($item->slug == 's-kkl')
                            <div class="mb-3">
                                <label for="r" class="col-form-label">Tempat Pelaksanaan Kuliah Kerja Lapangan
                                    (KKL) : {{ $item->formulir1 }}</label>
                            </div>

                            <div class="mb-3">
                                <label for="r" class="col-form-label">Alamat Tempat Pelaksanaan Kuliah Kerja
                                    Lapangan (KKL) : {{ $item->formulir2 }}</label>
                            </div>

                            <div class="mb-3">
                                <label for="r" class="col-form-label">Periode Pelaksanaan Kuliah Kerja Lapangan
                                    (KKL) : {{ $item->formulir3 }}</label>
                            </div>
                        @elseif($item->slug == 's-pkm')
                            <div class="mb-3">
                                <label for="r" class="col-form-label">Tempat Pelaksanaan Praktik Kegiatan
                                    Mengajar (PKM) : {{ $item->formulir1 }}</label>
                            </div>

                            <div class="mb-3">
                                <label for="r" class="col-form-label">Alamat Tempat Pelaksanaan Praktik
                                    Kegiatan Mengajar (PKM) : {{ $item->formulir2 }}</label>
                            </div>

                            <div class="mb-3">
                                <label for="r" class="col-form-label">Periode Pelaksanaan Praktik Kegiatan
                                    Mengajar (PKM) : {{ $item->formulir3 }}</label>
                            </div>
                        @elseif($item->slug == 's-pen')
                            <div class="mb-3">
                                <label for="r" class="col-form-label">Waktu Pelaksanaan Penelitian :
                                    {{ $item->formulir1 }}</label>
                            </div>
                            <div class="mb-3">
                                <label for="r" class="col-form-label">Tempat Pelaksanaan Penelitian :
                                    {{ $item->formulir2 }}</label>
                            </div>
                            <div class="mb-3">
                                <label for="r" class="col-form-label">Alamat Tempat Pelaksanaan Penelitian :
                                    {{ $item->formulir3 }}</label>
                            </div>
                            <div class="mb-3">
                                <label for="r" class="col-form-label">Alasan Keperluan Penelitian :
                                    {{ $item->formulir4 }}</label>
                            </div>
                        @elseif($item->slug == 's-skrip')

                        @elseif($item->slug == 's-rekom')
                            <div class="mb-3">
                                <label for="r" class="col-form-label">Alasan Pengajuan Rekomendasi :
                                    {{ $item->formulir1 }}</label>
                            </div>
                            <div class="mb-3">
                                <label for="r" class="col-form-label">Keterangan Rekomendasi :
                                    {{ $item->formulir2 }}</label>
                            </div>
                        @elseif($item->slug == 's-km')
                            <div class="mb-3">
                                <label for="r" class="col-form-label">Keperluan Pengajuan Surat Keterangan
                                    Mahasiswa : {{ $item->formulir1 }}</label>
                            </div>
                        @elseif($item->slug == 's-pratrans')
                            <div class="mb-3">
                                <label for="r" class="col-form-label">E-Mail Mahasiswa :
                                    {{ $item->formulir1 }}</label>
                            </div>
                            <div class="mb-3">
                                <label for="r" class="col-form-label">Alasan Pengajuan Surat Transkrip
                                    Nilai : {{ $item->formulir2 }}</label>
                            </div>
                        @elseif($item->slug == 's-lain')
                            <div class="mb-3">
                                <label for="r" class="col-form-label">E-Mail Mahasiswa :
                                    {{ $item->formulir1 }}</label>
                            </div>
                            <div class="mb-3">
                                <label for="r" class="col-form-label">Surat yang Ingin Diajukan :
                                    {{ $item->formulir2 }}"></label>
                            </div>
                            <div class="mb-3">
                                <label for="r" class="col-form-label">Kebutuhan Pengajuan Surat :
                                    {{ $item->formulir3 }}</label>
                            </div>
                        @endif

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-outline-danger">Reject</button>
                </div>
            </div>
            
            </form>
        </div>
    </div>
    </div>
@endforeach

@foreach ($pengajuansurattugas as $item)
    <div class="modal fade" id="rejectsurattugas{{ $item->id }}" aria-hidden="true"
        aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h1 class="modal-title fs-5" id="exampleModalToggleLabel2">Reject Pengajuan Surat</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('rejecting_tugas_kaprodi/'. $item->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="status" value="Ditolak" id="status">

                        <div class="mb-3">
                        <label for="" class="col-form-label">Nama Lengkap :
                            {{ $item->nama_mahasiswa }}</label>
                    </div>
                    <div class="mb-3">
                        <label for="" class="col-form-label">Program Studi :
                            {{ $item->prodi_mahasiswa }}</label>
                    </div>
                    <div class="mb-3">
                        <label for="" class="col-form-label">Nomor Induk Mahasiswa(NIM) :
                            {{ $item->nim_mahasiswa }}</label>
                    </div>
                    <div class="mb-3">
                        <label for="" class="col-form-label">Nomor Handphone Mahasiswa :
                            {{ $item->nomor_user }}</label>
                    </div>

                    @if ($item->slug == 's-skrip')
                        <div class="mb-3">
                            <label for="r" class="col-form-label">Dosen Pembimbing Skripsi 1</label>
                            <input type="text" class="form-control" id="formulir1" required name="formulir1"
                                value="{{ $item->formulir1 }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="r" class="col-form-label">Dosen Pembimbing Skripsi 2</label>
                            <input type="text" class="form-control" id="formulir2" required name="formulir2"
                                value="{{ $item->formulir2 }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="r" class="col-form-label">Semester Sekarang</label>
                            <input type="number" class="form-control" id="message-text" id="formulir3" required
                                name="formulir3" value="{{ $item->formulir3 }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="r" class="col-form-label">Judul atau Topik Skripsi</label>
                            <textarea type="text" class="form-control" id="formulir4" required name="formulir4" readonly
                                value="{{ $item->formulir4 }}">{{ $item->formulir4 }}</textarea>
                        </div>
                    @endif
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-outline-danger">Reject</button>
                </div>
                </form>
            </div>
        </div>
    </div>
@endforeach

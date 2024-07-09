
<!--EDIT DATA SURAT MAHASISWA-->
@foreach ($pengajuansurat as $item)
    <div class="modal fade" id="edit{{ $item->id }}" aria-hidden="true"
        aria-labelledby="exampleModalToggleLabel2" tabindex="-1" data-bs-backdrop="static"
        data-bs-keyboard="false">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalToggleLabel2">Edit Data Surat Mahasiswa</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                @if ($item->status == 'Ditolak' || $item->status == 'Diproses')
                    <div class="modal-body">
                        <form action="{{ url('pengajuansuratmahasiswa/' . $item->id) }}" method="post"
                            enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <input type="hidden" value="{{ $item->id_surat }}" name="id_surat" id="id_surat">
                            <input type="hidden" value="Diproses" name="status" id="status">
                            <input type="hidden" value="{{ $item->slug }}" name="slug" id="slug">
                            <input type="hidden" value="{{ $item->nama_surat }}" name="nama_surat"
                                id="nama_surat">
                            <input type="hidden" name="nomor_surat" value="{{ $item->nomor_surat }}"
                                id="nomor_surat">
                            <input type="hidden" name="id_user" value="{{ $item->id_user }}">
                            <input type="hidden" class="form-control" name="nomor_urut"
                                value = "{{ $item->nomor_urut }}" required>

                            <div class="mb-3">
                                <label for="" class="col-form-label">Nama Lengkap</label>
                                <input type="text" class="form-control" id="nama_mahasiswa" required
                                    value="{{ $item->nama_mahasiswa }}" name="nama_mahasiswa">
                            </div>
                            <div class="mb-3">
                                <label for="" class="col-form-label">Program Studi</label>
                                <input type="text" class="form-control" id="prodi_mahasiswa" required
                                    value="{{ $item->prodi_mahasiswa }}" name="prodi_mahasiswa" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="" class="col-form-label">Nomor Induk Mahasiswa(NIM)</label>
                                <input type="text" class="form-control" id="nim_mahasiswa" required
                                    value="{{ $item->nim_mahasiswa }}" name="nim_mahasiswa">
                            </div>

                            <div class="mb-3">
                                <label for="" class="col-form-label">Nomor Handphone Mahasiswa</label>
                                <input type="text" class="form-control" id="nomor_user" required
                                    name="nomor_user" value="{{ $item->nomor_user }}">
                            </div>

                            @if ($item->slug == 's-pd')
                                <div class="mb-3">
                                    <label for="r" class="col-form-label">Instansi/Tempat Tujuan</label>
                                    <input type="text" class="form-control" id="formulir1" required
                                        name="formulir1" value="{{ $item->formulir1 }}">
                                </div>

                                <div class="mb-3">
                                    <label for="r" class="col-form-label">Alamat Instansi/Tempat Tujuan</label>
                                    <input type="text" class="form-control" id="formulir2" required
                                        name="formulir2" value="{{ $item->formulir2 }}">
                                </div>

                                <div class="mb-3">
                                    <label for="r" class="col-form-label">Waktu Pelaksanaan</label>
                                    <input type="text" class="form-control" id="formulir3" required
                                        name="formulir3" value="{{ $item->formulir3 }}">
                                </div>

                                <div class="mb-3">
                                    <label for="r" class="col-form-label">Data yang Diperlukan</label>
                                    <input type="text" class="form-control" id="formulir4" required
                                        name="formulir4" value="{{ $item->formulir4 }}">
                                </div>
                            @elseif($item->slug == 's-pol')
                                <div class="mb-3">
                                    <label for="r" class="col-form-label">Waktu Pelaksanaan Observasi</label>
                                    <input type="text" class="form-control" id="formulir1" required
                                        name="formulir1">
                                </div>
                                <div class="mb-3">
                                    <label for="r" class="col-form-label">Tempat Pelaksanaan Observasi</label>
                                    <input type="text" class="form-control" id="formulir2" required
                                        name="formulir2">
                                </div>
                                <div class="mb-3">
                                    <label for="r" class="col-form-label">Alamat Tempat Pelaksanaan
                                        Observasi</label>
                                    <input type="text" class="form-control" id="formulir3" required
                                        name="formulir3">
                                </div>
                                <div class="mb-3">
                                    <label for="r" class="col-form-label">Alasan Keperluan Observasi</label>
                                    <input type="text" class="form-control" id="formulir4" required
                                        name="formulir4">
                                </div>
                            @elseif($item->slug == 's-trans')
                                <div class="mb-3">
                                    <label for="r" class="col-form-label">E-Mail Mahasiswa</label>
                                    <input type="text" class="form-control" id="formulir1" required
                                        name="formulir1" value="{{ $item->formulir1 }}">
                                </div>
                                <div class="mb-3">
                                    <label for="r" class="col-form-label">Alasan Pengajuan Surat Transkrip
                                        Nilai</label>
                                    <input type="text" class="form-control" id="formulir2" required
                                        name="formulir2" value="{{ $item->formulir2 }}">
                                </div>
                            @elseif($item->slug == 's-pkl')
                                <div class="mb-3">
                                    <label for="r" class="col-form-label">Tempat Pelaksanaan Praktik Kerja
                                        Lapangan
                                        (PKL)
                                    </label>
                                    <input type="text" class="form-control" id="formulir1" required
                                        name="formulir1" value="{{ $item->formulir1 }}">
                                </div>

                                <div class="mb-3">
                                    <label for="r" class="col-form-label">Alamat Tempat Pelaksanaan Praktik
                                        Kerja
                                        Lapangan (PKL)</label>
                                    <input type="text" class="form-control" id="formulir2" required
                                        name="formulir2" value="{{ $item->formulir2 }}">
                                </div>

                                <div class="mb-3">
                                    <label for="r" class="col-form-label">Periode Pelaksanaan Praktik Kerja
                                        Lapangan (PKL)</label>
                                    <input type="text" class="form-control" id="formulir3" required
                                        name="formulir3" value="{{ $item->formulir3 }}">
                                </div>
                            @elseif($item->slug == 's-kkl')
                                <div class="mb-3">
                                    <label for="r" class="col-form-label">Tempat Pelaksanaan Kuliah Kerja
                                        Lapangan
                                        (KKL)</label>
                                    <input type="text" class="form-control" id="formulir1" required
                                        name="formulir1" value="{{ $item->formulir1 }}">
                                </div>

                                <div class="mb-3">
                                    <label for="r" class="col-form-label">Alamat Tempat Pelaksanaan Kuliah
                                        Kerja
                                        Lapangan (KKL)</label>
                                    <input type="text" class="form-control" id="formulir2" required
                                        name="formulir2" value="{{ $item->formulir2 }}">
                                </div>

                                <div class="mb-3">
                                    <label for="r" class="col-form-label">Periode Pelaksanaan Kuliah Kerja
                                        Lapangan
                                        (KKL)</label>
                                    <input type="text" class="form-control" id="formulir3" required
                                        name="formulir3" value="{{ $item->formulir3 }}">
                                </div>
                            @elseif($item->slug == 's-pkm')
                                <div class="mb-3">
                                    <label for="r" class="col-form-label">Tempat Pelaksanaan Praktik Kegiatan
                                        Mengajar (PKM)</label>
                                    <input type="text" class="form-control" id="formulir1" required
                                        name="formulir1" value="{{ $item->formulir1 }}">
                                </div>
                                <div class="mb-3">
                                    <label for="r" class="col-form-label">Alamat Tempat Pelaksanaan Praktik
                                        Kegiatan Mengajar (PKM)</label>
                                    <input type="text" class="form-control" id="formulir2" required
                                        name="formulir2" value="{{ $item->formulir2 }}">
                                </div>
                                <div class="mb-3">
                                    <label for="r" class="col-form-label">Semester</label>
                                    <input type="text" class="form-control" id="formulir3" required
                                        name="formulir3" value="{{ $item->formulir3 }}">
                                </div>
                                <div class="mb-3">
                                    <label for="r" class="col-form-label">Periode Tahun Akademik</label>
                                    <input type="text" class="form-control" id="formulir4" required
                                        name="formulir4" value="{{ $item->formulir4 }}">
                                </div>
                            @elseif($item->slug == 's-pen')
                                <div class="mb-3">
                                    <label for="r" class="col-form-label">Waktu Pelaksanaan Penelitian</label>
                                    <input type="text" class="form-control" id="formulir1" required
                                        name="formulir1" value="{{ $item->formulir1 }}">
                                </div>
                                <div class="mb-3">
                                    <label for="r" class="col-form-label">Tempat Pelaksanaan Penelitian</label>
                                    <input type="text" class="form-control" id="formulir2" required
                                        name="formulir2" value="{{ $item->formulir2 }}">
                                </div>
                                <div class="mb-3">
                                    <label for="r" class="col-form-label">Alamat Tempat Pelaksanaan
                                        Penelitian</label>
                                    <textarea class="form-control" id="message-text" id="formulir3" required name="formulir3"
                                        value="{{ $item->formulir3 }}">{{ $item->formulir3 }}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="r" class="col-form-label">Alasan Keperluan Penelitian</label>
                                    <input type="text" class="form-control" id="formulir4" required
                                        name="formulir4" value="{{ $item->formulir4 }}">
                                </div>
                            @elseif($item->slug == 's-rekom')
                                <div class="mb-3">
                                    <label for="r" class="col-form-label">Alasan Pengajuan Rekomendasi</label>
                                    <input type="text" class="form-control" id="formulir1" required
                                        name="formulir1" value="{{ $item->formulir1 }}">
                                </div>
                                <div class="mb-3">
                                    <label for="r" class="col-form-label">Keterangan Rekomendasi</label>
                                    <input type="text" class="form-control" id="formulir2" required
                                        name="formulir2" value="{{ $item->formulir2 }}">
                                </div>
                            @elseif($item->slug == 's-km')
                                <div class="mb-3">
                                    <label for="r" class="col-form-label">Keperluan Pengajuan Surat Keterangan
                                        Mahasiswa</label>
                                    <input type="text" class="form-control" id="formulir1" required
                                        name="formulir1" value="{{ $item->formulir1 }}">
                                </div>
                            @elseif($item->slug == 's-pratrans')
                                <div class="mb-3">
                                    <label for="r" class="col-form-label">E-Mail Mahasiswa</label>
                                    <input type="text" class="form-control" id="formulir1" required
                                        name="formulir1" value="{{ $item->formulir1 }}">
                                </div>
                                <div class="mb-3">
                                    <label for="r" class="col-form-label">Alasan Pengajuan Surat Transkrip
                                        Nilai</label>
                                    <input type="text" class="form-control" id="formulir2" required
                                        name="formulir2" value="{{ $item->formulir2 }}">
                                </div>
                            @elseif($item->slug == 's-lain')
                                <div class="mb-3">
                                    <label for="r" class="col-form-label">E-Mail Mahasiswa</label>
                                    <input type="text" class="form-control" id="formulir1" required
                                        name="formulir1" value="{{ $item->formulir1 }}">
                                </div>
                                <div class="mb-3">
                                    <label for="r" class="col-form-label">Surat yang Ingin Diajukan</label>
                                    <input type="text" class="form-control" id="formulir2" required
                                        name="formulir2" value="{{ $item->formulir2 }}">
                                </div>
                                <div class="mb-3">
                                    <label for="r" class="col-form-label">Kebutuhan Pengajuan Surat</label>
                                    <input type="text" class="form-control" id="formulir3" required
                                        name="formulir3" value="{{ $item->formulir3 }}">
                                </div>
                            @endif

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary"
                            data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-outline-primary">Ubah Data</button>
                    </div>
                    </form>
                @else
                    <div class="modal-body">
                        <form action="{{ url('ajukankaprodi/' . $item->id) }}" method="post"
                            enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <input type="hidden" value="{{ $item->id_surat }}" name="id_surat" id="id_surat">
                            <input type="hidden" value="Diproses" name="status" id="status">
                            <input type="hidden" value="{{ $item->slug }}" name="slug" id="slug">
                            <input type="hidden" value="{{ $item->nama_surat }}" name="nama_surat"
                                id="nama_surat">
                            <input type="hidden" name="nomor_surat" value="{{ $item->nomor_surat }}"
                                id="nomor_surat">
                            <input type="hidden" name="id_user" value="{{ $item->id_user }}">
                            <input type="hidden" class="form-control" name="nomor_urut"
                                value = "{{ $item->nomor_urut }}" required>
                            <div class="mb-3">
                                <label for="" class="col-form-label">Nama Lengkap</label>
                                <input type="text" class="form-control" id="nama_mahasiswa" required
                                    value="{{ $item->nama_mahasiswa }}" name="nama_mahasiswa">
                            </div>
                            <div class="mb-3">
                                <label for="" class="col-form-label">Program Studi</label>
                                <input type="text" class="form-control" id="prodi_mahasiswa" required
                                    value="{{ $item->prodi_mahasiswa }}" name="prodi_mahasiswa" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="" class="col-form-label">Nomor Induk Mahasiswa(NIM)</label>
                                <input type="text" class="form-control" id="nim_mahasiswa" required
                                    value="{{ $item->nim_mahasiswa }}" name="nim_mahasiswa">
                            </div>

                            <div class="mb-3">
                                <label for="" class="col-form-label">Nomor Handphone Mahasiswa</label>
                                <input type="text" class="form-control" id="nomor_user" required
                                    name="nomor_user" value="{{ $item->nomor_user }}">
                            </div>

                            @if ($item->slug == 's-pd')
                                <div class="mb-3">
                                    <label for="r" class="col-form-label">Instansi/Tempat Tujuan</label>
                                    <input type="text" class="form-control" id="formulir1" required
                                        name="formulir1" value="{{ $item->formulir1 }}">
                                </div>

                                <div class="mb-3">
                                    <label for="r" class="col-form-label">Alamat Instansi/Tempat
                                        Tujuan</label>
                                    <input type="text" class="form-control" id="formulir2" required
                                        name="formulir2" value="{{ $item->formulir2 }}">
                                </div>

                                <div class="mb-3">
                                    <label for="r" class="col-form-label">Waktu Pelaksanaan</label>
                                    <input type="text" class="form-control" id="formulir3" required
                                        name="formulir3" value="{{ $item->formulir3 }}">
                                </div>

                                <div class="mb-3">
                                    <label for="r" class="col-form-label">Data yang Diperlukan</label>
                                    <input type="text" class="form-control" id="formulir4" required
                                        name="formulir4" value="{{ $item->formulir4 }}">
                                </div>
                            @elseif($item->slug == 's-pol')
                                <div class="mb-3">
                                    <label for="r" class="col-form-label">Waktu Pelaksanaan Observasi</label>
                                    <input type="text" class="form-control" id="formulir1" required
                                        name="formulir1">
                                </div>
                                <div class="mb-3">
                                    <label for="r" class="col-form-label">Tempat Pelaksanaan
                                        Observasi</label>
                                    <input type="text" class="form-control" id="formulir2" required
                                        name="formulir2">
                                </div>
                                <div class="mb-3">
                                    <label for="r" class="col-form-label">Alamat Tempat Pelaksanaan
                                        Observasi</label>
                                    <input type="text" class="form-control" id="formulir3" required
                                        name="formulir3">
                                </div>
                                <div class="mb-3">
                                    <label for="r" class="col-form-label">Alasan Keperluan Observasi</label>
                                    <input type="text" class="form-control" id="formulir4" required
                                        name="formulir4">
                                </div>
                            @elseif($item->slug == 's-trans')
                                <div class="mb-3">
                                    <label for="r" class="col-form-label">E-Mail Mahasiswa</label>
                                    <input type="text" class="form-control" id="formulir1" required
                                        name="formulir1" value="{{ $item->formulir1 }}">
                                </div>
                                <div class="mb-3">
                                    <label for="r" class="col-form-label">Alasan Pengajuan Surat Transkrip
                                        Nilai</label>
                                    <input type="text" class="form-control" id="formulir2" required
                                        name="formulir2" value="{{ $item->formulir2 }}">
                                </div>
                            @elseif($item->slug == 's-pkl')
                                <div class="mb-3">
                                    <label for="r" class="col-form-label">Tempat Pelaksanaan Praktik Kerja
                                        Lapangan
                                        (PKL)
                                    </label>
                                    <input type="text" class="form-control" id="formulir1" required
                                        name="formulir1" value="{{ $item->formulir1 }}">
                                </div>

                                <div class="mb-3">
                                    <label for="r" class="col-form-label">Alamat Tempat Pelaksanaan Praktik
                                        Kerja
                                        Lapangan (PKL)</label>
                                    <input type="text" class="form-control" id="formulir2" required
                                        name="formulir2" value="{{ $item->formulir2 }}">
                                </div>

                                <div class="mb-3">
                                    <label for="r" class="col-form-label">Periode Pelaksanaan Praktik Kerja
                                        Lapangan (PKL)</label>
                                    <input type="text" class="form-control" id="formulir3" required
                                        name="formulir3" value="{{ $item->formulir3 }}">
                                </div>
                            @elseif($item->slug == 's-kkl')
                                <div class="mb-3">
                                    <label for="r" class="col-form-label">Tempat Pelaksanaan Kuliah Kerja
                                        Lapangan
                                        (KKL)</label>
                                    <input type="text" class="form-control" id="formulir1" required
                                        name="formulir1" value="{{ $item->formulir1 }}">
                                </div>

                                <div class="mb-3">
                                    <label for="r" class="col-form-label">Alamat Tempat Pelaksanaan Kuliah
                                        Kerja
                                        Lapangan (KKL)</label>
                                    <input type="text" class="form-control" id="formulir2" required
                                        name="formulir2" value="{{ $item->formulir2 }}">
                                </div>

                                <div class="mb-3">
                                    <label for="r" class="col-form-label">Periode Pelaksanaan Kuliah Kerja
                                        Lapangan
                                        (KKL)</label>
                                    <input type="text" class="form-control" id="formulir3" required
                                        name="formulir3" value="{{ $item->formulir3 }}">
                                </div>
                            @elseif($item->slug == 's-pkm')
                                <div class="mb-3">
                                    <label for="r" class="col-form-label">Tempat Pelaksanaan Praktik Kegiatan
                                        Mengajar (PKM)</label>
                                    <input type="text" class="form-control" id="formulir1" required
                                        name="formulir1" value="{{ $item->formulir1 }}">
                                </div>
                                <div class="mb-3">
                                    <label for="r" class="col-form-label">Alamat Tempat Pelaksanaan Praktik
                                        Kegiatan Mengajar (PKM)</label>
                                    <input type="text" class="form-control" id="formulir2" required
                                        name="formulir2" value="{{ $item->formulir2 }}">
                                </div>
                                <div class="mb-3">
                                    <label for="r" class="col-form-label">Semester</label>
                                    <input type="text" class="form-control" id="formulir3" required
                                        name="formulir3" value="{{ $item->formulir3 }}">
                                </div>
                                <div class="mb-3">
                                    <label for="r" class="col-form-label">Periode Tahun Akademik</label>
                                    <input type="text" class="form-control" id="formulir4" required
                                        name="formulir4" value="{{ $item->formulir4 }}">
                                </div>
                            @elseif($item->slug == 's-pen')
                                <div class="mb-3">
                                    <label for="r" class="col-form-label">Waktu Pelaksanaan
                                        Penelitian</label>
                                    <input type="text" class="form-control" id="formulir1" required
                                        name="formulir1" value="{{ $item->formulir1 }}">
                                </div>
                                <div class="mb-3">
                                    <label for="r" class="col-form-label">Tempat Pelaksanaan
                                        Penelitian</label>
                                    <input type="text" class="form-control" id="formulir2" required
                                        name="formulir2" value="{{ $item->formulir2 }}">
                                </div>
                                <div class="mb-3">
                                    <label for="r" class="col-form-label">Alamat Tempat Pelaksanaan
                                        Penelitian</label>
                                    <textarea class="form-control" id="message-text" id="formulir3" required name="formulir3"
                                        value="{{ $item->formulir3 }}">{{ $item->formulir3 }}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="r" class="col-form-label">Alasan Keperluan Penelitian</label>
                                    <input type="text" class="form-control" id="formulir4" required
                                        name="formulir4" value="{{ $item->formulir4 }}">
                                </div>
                            @elseif($item->slug == 's-rekom')
                                <div class="mb-3">
                                    <label for="r" class="col-form-label">Alasan Pengajuan
                                        Rekomendasi</label>
                                    <input type="text" class="form-control" id="formulir1" required
                                        name="formulir1" value="{{ $item->formulir1 }}">
                                </div>
                                <div class="mb-3">
                                    <label for="r" class="col-form-label">Keterangan Rekomendasi</label>
                                    <input type="text" class="form-control" id="formulir2" required
                                        name="formulir2" value="{{ $item->formulir2 }}">
                                </div>
                            @elseif($item->slug == 's-km')
                                <div class="mb-3">
                                    <label for="r" class="col-form-label">Keperluan Pengajuan Surat
                                        Keterangan
                                        Mahasiswa</label>
                                    <input type="text" class="form-control" id="formulir1" required
                                        name="formulir1" value="{{ $item->formulir1 }}">
                                </div>
                            @elseif($item->slug == 's-pratrans')
                                <div class="mb-3">
                                    <label for="r" class="col-form-label">E-Mail Mahasiswa</label>
                                    <input type="text" class="form-control" id="formulir1" required
                                        name="formulir1" value="{{ $item->formulir1 }}">
                                </div>
                                <div class="mb-3">
                                    <label for="r" class="col-form-label">Alasan Pengajuan Surat Transkrip
                                        Nilai</label>
                                    <input type="text" class="form-control" id="formulir2" required
                                        name="formulir2" value="{{ $item->formulir2 }}">
                                </div>
                            @elseif($item->slug == 's-lain')
                                <div class="mb-3">
                                    <label for="r" class="col-form-label">E-Mail Mahasiswa</label>
                                    <input type="text" class="form-control" id="formulir1" required
                                        name="formulir1" value="{{ $item->formulir1 }}">
                                </div>
                                <div class="mb-3">
                                    <label for="r" class="col-form-label">Surat yang Ingin Diajukan</label>
                                    <input type="text" class="form-control" id="formulir2" required
                                        name="formulir2" value="{{ $item->formulir2 }}">
                                </div>
                                <div class="mb-3">
                                    <label for="r" class="col-form-label">Kebutuhan Pengajuan Surat</label>
                                    <input type="text" class="form-control" id="formulir3" required
                                        name="formulir3" value="{{ $item->formulir3 }}">
                                </div>
                            @endif

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary"
                            data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-outline-primary">Ubah Data</button>
                    </div>
                    </form>
                @endif

            </div>
        </div>
    </div>
@endforeach

@foreach ($pengajuansurattugas as $item)
    <div class="modal fade" id="edittugas{{ $item->id }}" aria-hidden="true"
        aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalToggleLabel2">Edit Data Surat Mahasiswa</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                @if ($item->status == 'Ditolak' || $item->status == 'Diproses')
                    <div class="modal-body">
                        <form action="{{ url('update_tugas/' . $item->id) }}" method="post"
                            enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <input type="hidden" value="{{ $item->id_surat }}" name="id_surat" id="id_surat">
                            <input type="hidden" value="Diproses" name="status" id="status">
                            <input type="hidden" value="{{ $item->slug }}" name="slug" id="slug">
                            <input type="hidden" value="{{ $item->nama_surat }}" name="nama_surat"
                                id="nama_surat">
                            <input type="hidden" name="nomor_surat" value="{{ $item->nomor_surat }}"
                                id="nomor_surat">
                            <input type="hidden" name="id_user" value="{{ $item->id_user }}">
                            <input type="hidden" class="form-control" name="nomor_urut"
                                value = "{{ $item->nomor_urut }}" required>
                            <div class="mb-3">
                                <label for="" class="col-form-label">Nama Lengkap</label>
                                <input type="text" class="form-control" id="nama_mahasiswa" required
                                    value="{{ $item->nama_mahasiswa }}" name="nama_mahasiswa">
                            </div>
                            <div class="mb-3">
                                <label for="" class="col-form-label">Program Studi</label>
                                <input type="text" class="form-control" id="prodi_mahasiswa" required
                                    value="{{ $item->prodi_mahasiswa }}" name="prodi_mahasiswa" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="" class="col-form-label">Nomor Induk Mahasiswa(NIM)</label>
                                <input type="text" class="form-control" id="nim_mahasiswa" required
                                    value="{{ $item->nim_mahasiswa }}" name="nim_mahasiswa">
                            </div>

                            <div class="mb-3">
                                <label for="" class="col-form-label">Nomor Handphone Mahasiswa</label>
                                <input type="text" class="form-control" id="nomor_user" required
                                    name="nomor_user" value="{{ $item->nomor_user }}">
                            </div>

                            @if ($item->slug == 's-laintugas')
                                <div class="mb-3">
                                    <label for="r" class="col-form-label">E-Mail Mahasiswa</label>
                                    <input type="text" class="form-control" id="formulir1" required
                                        name="formulir1" value="{{ $item->formulir1 }}">
                                </div>
                                <div class="mb-3">
                                    <label for="r" class="col-form-label">Surat Tugas yang Ingin
                                        Diajukan</label>
                                    <input type="text" class="form-control" id="formulir2" required
                                        name="formulir2" value="{{ $item->formulir2 }}">
                                </div>
                                <div class="mb-3">
                                    <label for="r" class="col-form-label">Kebutuhan Pengajuan Surat
                                        Tugas</label>
                                    <input type="text" class="form-control" id="formulir3" required
                                        name="formulir3" value="{{ $item->formulir3 }}">
                                </div>
                            @elseif($item->slug == 's-skrip')
                                <div class="mb-3">
                                    <label for="r" class="col-form-label">Dosen Pembimbing Skripsi 1</label>
                                    <input type="text" class="form-control" id="formulir1" required
                                        name="formulir1" value="{{ $item->formulir1 }}">
                                </div>
                                <div class="mb-3">
                                    <label for="r" class="col-form-label">Dosen Pembimbing Skripsi 2</label>
                                    <input type="text" class="form-control" id="formulir2" required
                                        name="formulir2" value="{{ $item->formulir2 }}">
                                </div>
                                <div class="mb-3">
                                    <label for="r" class="col-form-label">Semester Sekarang</label>
                                    <input type="number" class="form-control" id="message-text" id="formulir3"
                                        required name="formulir3" value="{{ $item->formulir3 }}">
                                </div>
                                <div class="mb-3">
                                    <label for="r" class="col-form-label">Judul atau Topik Skripsi</label>
                                    <textarea type="text" class="form-control" id="formulir4" required name="formulir4"
                                        value="{{ $item->formulir4 }}">{{ $item->formulir4 }}</textarea>
                                </div>
                            @endif
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary"
                            data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-outline-primary">Ubah Data</button>
                    </div>
                    </form>
                @else
                    <div class="modal-body">
                        <form action="{{ url('ajukankaproditugas/' . $item->id) }}" method="post"
                            enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <input type="hidden" value="{{ $item->id_surat }}" name="id_surat"
                                id="id_surat">
                            <input type="hidden" value="Diproses" name="status" id="status">
                            <input type="hidden" value="{{ $item->slug }}" name="slug" id="slug">
                            <input type="hidden" value="{{ $item->nama_surat }}" name="nama_surat"
                                id="nama_surat">
                            <input type="hidden" name="nomor_surat" value="{{ $item->nomor_surat }}"
                                id="nomor_surat">
                            <input type="hidden" name="id_user" value="{{ $item->id_user }}">
                            <input type="hidden" class="form-control" name="nomor_urut"
                                value = "{{ $item->nomor_urut }}" required>
                            <div class="mb-3">
                                <label for="" class="col-form-label">Nama Lengkap</label>
                                <input type="text" class="form-control" id="nama_mahasiswa" required
                                    value="{{ $item->nama_mahasiswa }}" name="nama_mahasiswa">
                            </div>
                            <div class="mb-3">
                                <label for="" class="col-form-label">Program Studi</label>
                                <input type="text" class="form-control" id="prodi_mahasiswa" required
                                    value="{{ $item->prodi_mahasiswa }}" name="prodi_mahasiswa" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="" class="col-form-label">Nomor Induk Mahasiswa(NIM)</label>
                                <input type="text" class="form-control" id="nim_mahasiswa" required
                                    value="{{ $item->nim_mahasiswa }}" name="nim_mahasiswa">
                            </div>

                            <div class="mb-3">
                                <label for="" class="col-form-label">Nomor Handphone Mahasiswa</label>
                                <input type="text" class="form-control" id="nomor_user" required
                                    name="nomor_user" value="{{ $item->nomor_user }}">
                            </div>

                            @if ($item->slug == 's-skrip')
                                <div class="mb-3">
                                    <label for="r" class="col-form-label">Dosen Pembimbing Skripsi 1</label>
                                    <input type="text" class="form-control" id="formulir1" required
                                        name="formulir1" value="{{ $item->formulir1 }}">
                                </div>
                                <div class="mb-3">
                                    <label for="r" class="col-form-label">Dosen Pembimbing Skripsi 2</label>
                                    <input type="text" class="form-control" id="formulir2" required
                                        name="formulir2" value="{{ $item->formulir2 }}">
                                </div>
                                <div class="mb-3">
                                    <label for="r" class="col-form-label">Semester Sekarang</label>
                                    <input type="number" class="form-control" id="message-text" id="formulir3"
                                        required name="formulir3" value="{{ $item->formulir3 }}">
                                </div>
                                <div class="mb-3">
                                    <label for="r" class="col-form-label">Judul atau Topik Skripsi</label>
                                    <textarea type="text" class="form-control" id="formulir4" required name="formulir4"
                                        value="{{ $item->formulir4 }}">{{ $item->formulir4 }}</textarea>
                                </div>
                            @elseif($item->slug == 's-laintugas')
                                <div class="mb-3">
                                    <label for="r" class="col-form-label">E-Mail Mahasiswa</label>
                                    <input type="text" class="form-control" id="formulir1" required
                                        name="formulir1" value="{{ $item->formulir1 }}">
                                </div>
                                <div class="mb-3">
                                    <label for="r" class="col-form-label">Surat yang Ingin Diajukan</label>
                                    <input type="text" class="form-control" id="formulir2" required
                                        name="formulir2" value="{{ $item->formulir2 }}">
                                </div>
                                <div class="mb-3">
                                    <label for="r" class="col-form-label">Kebutuhan Pengajuan Surat</label>
                                    <input type="text" class="form-control" id="formulir3" required
                                        name="formulir3" value="{{ $item->formulir3 }}">
                                </div>
                            @endif
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary"
                            data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-outline-primary">Ubah Data</button>
                    </div>
                    </form>
                @endif

            </div>
        </div>
    </div>
@endforeach
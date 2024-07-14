<!--LIHAT DATA SURAT MAHASISWA-->
@foreach ($pengajuansurat as $item)
    <div class="modal fade" id="view{{ $item->id }}" aria-hidden="true" aria-labelledby="exampleModalToggleLabel "
        data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Detail Surat</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @if ($item->nomor_urut != null)
                        <form action="{{ url('pengajuansuratmahasiswa/' . $item->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="status" value="Diproses" id="status">
                        @else
                            <form action="{{ url('/ajukankaprodi/' . $item->id) }}" method="post">
                                @csrf
                                @method('PUT')
                    @endif

                    @foreach (['id_surat', 'slug', 'nama_surat', 'nomor_surat', 'id_user', 'nama_mahasiswa', 'prodi_mahasiswa', 'nim_mahasiswa', 'nomor_user', 'formulir1', 'formulir2', 'formulir3', 'formulir4', 'formulir5', 'formulir6'] as $field)
                        <input type="hidden" name="{{ $field }}" value="{{ $item->$field }}"
                            id="{{ $field }}">
                    @endforeach

                    @if ($item->nomor_urut != null)
                        <div class="mb-3">
                            <label for="" class="col-form-label">Nomor Urut Surat</label>
                            <input type="text" class="form-control" name="nomor_urut"
                                placeholder = "{{ $item->nomor_urut }}" required readonly>
                        </div>
                    @else
                        <div class="mb-3">
                            <label for="" class="col-form-label">Nomor Urut Surat</label>
                            <input type="number" class="form-control" name="nomor_urut"
                                value = "{{ $lastNomorUrut += 1 }}" required>
                        </div>
                    @endif

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
                @if ($item->nomor_urut != null)
                    @if ($item->slug != 's-lain')
                        <div class="modal-footer">
                            <button class="btn btn-primary" type="button" data-bs-target="#edit{{ $item->id }}"
                                data-bs-toggle="modal">Edit
                                Surat</button>
                            <button class="btn btn-outline-info" type="submit">Ajukan</button>
                        </div>
                    @else
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-danger"
                                data-bs-dismiss="modal">Close</button>

                        </div>
                    @endif
                @else
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Close</button>
                        <button class="btn btn-outline-info" type="submit">Buat Nomor Urut Surat</button>
                    </div>
                @endif

                </form>
            </div>
        </div>
    </div>
@endforeach

@foreach ($pengajuansurattugas as $item)
    <div class="modal fade" id="viewtugas{{ $item->id }}" aria-hidden="true"
        aria-labelledby="exampleModalToggleLabel" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Detail Surat</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @if ($item->nomor_urut != null)
                        <form action="{{ url('update_tugas/' . $item->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="status" value="Diproses" id="status">
                        @else
                            <form action="{{ url('ajukankaproditugas/' . $item->id) }}" method="post">
                                @csrf
                                @method('PUT')
                    @endif

                    @foreach (['id_surat', 'slug', 'nama_surat', 'nomor_surat', 'id_user', 'nama_mahasiswa', 'prodi_mahasiswa', 'nim_mahasiswa', 'nomor_user', 'formulir1', 'formulir2', 'formulir3', 'formulir4', 'formulir5', 'formulir6'] as $field)
                        <input type="hidden" name="{{ $field }}" value="{{ $item->$field }}"
                            id="{{ $field }}">
                    @endforeach

                    @if ($item->nomor_urut != null)
                        <div class="mb-3">
                            <label for="" class="col-form-label">Nomor Urut Surat</label>
                            <input type="text" class="form-control" name="nomor_urut"
                                placeholder = "{{ $item->nomor_urut }}" value="{{$item->nomor_urut}}" required readonly>
                        </div>
                    @else
                        <div class="mb-3">
                            <label for="" class="col-form-label">Nomor Urut Surat</label>
                            <input type="number" class="form-control" name="nomor_urut"
                                value = "{{ $lastNomorUrutTugas += 1 }}" required>
                        </div>
                    @endif
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
                    @else
                        <div class="mb-3">
                            <label for="r" class="col-form-label">E-Mail Mahasiswa</label>
                            <input type="text" class="form-control" id="formulir1" required name="formulir1"
                                value="{{ $item->formulir1 }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="r" class="col-form-label">Surat Tugas yang Ingin Diajukan</label>
                            <input type="text" class="form-control" id="formulir2" required name="formulir2"
                                value="{{ $item->formulir2 }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="r" class="col-form-label">Kebutuhan Pengajuan Surat Tugas</label>
                            <input type="text" class="form-control" id="formulir3" required name="formulir3"
                                value="{{ $item->formulir3 }}" readonly>
                        </div>
                    @endif

                </div>
                @if ($item->nomor_urut == null)
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Close</button>
                        <button class="btn btn-outline-info" type="submit">Buat Nomor Urut Surat</button>
                    </div>
                @else
                    @if ($item->slug != 's-laintugas')
                        <div class="modal-footer">
                            <button class="btn btn-primary" type="button"
                                data-bs-target="#edittugas{{ $item->id }}" data-bs-toggle="modal">Edit
                                Surat</button>
                            <button class="btn btn-outline-info" type="submit">Ajukan</button>
                        </div>
                    @else
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-danger"
                                data-bs-dismiss="modal">Close</button>
                        </div>
                    @endif
                @endif
                </form>
            </div>
        </div>
    </div>
@endforeach

<!--UPLOAD MANUAL SURAT MAHASISWA YANG DIAJUKAN-->
@foreach ($pengajuansurat as $item)
    <div class="modal fade" id="uploadmanual{{ $item->id }}" aria-hidden="true"
        aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalToggleLabel2">Upload Surat Manual</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('uploadmanual/' . $item->id) }}" method="post"
                        enctype="multipart/form-data">
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

                        <div class="mb-3">
                            <label for="" class="col-form-label">Tempat Tujuan:
                                {{ $item->formulir1 }}</label>

                        </div>
                        <div class="mb-3">
                            <label for="" class="col-form-label">Alamat Tujuan:
                                {{ $item->formulir2 }}</label>

                        </div>
                        <div class="mb-3">
                            <label for="" class="col-form-label">Waktu Pelaksanaan
                                {{ $item->formulir3 }}</label>

                        </div>
                        <div class="mb-3">
                            <label for="" class="col-form-label">Input File Surat: Maksimal 2 MB </label>
                            <input type="file" class="form-control" name="file_acc" id="file_acc">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-outline-success">Upload</button>
                </div>
                </form>
            </div>
        </div>
    </div>
@endforeach

@foreach ($pengajuansurattugas as $item)
    <div class="modal fade" id="uploadmanual_tugas{{ $item->id }}" aria-hidden="true"
        aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalToggleLabel2">Upload Surat Manual</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('uploadmanual_tugas/' . $item->id) }}" method="post"
                        enctype="multipart/form-data">
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

                        <div class="mb-3">
                            <label for="" class="col-form-label">Tempat Tujuan:
                                {{ $item->formulir1 }}</label>

                        </div>
                        <div class="mb-3">
                            <label for="" class="col-form-label">Alamat Tujuan:
                                {{ $item->formulir2 }}</label>

                        </div>
                        <div class="mb-3">
                            <label for="" class="col-form-label">Waktu Pelaksanaan
                                {{ $item->formulir3 }}</label>

                        </div>
                        <div class="mb-3">
                            <label for="" class="col-form-label">Input File Surat Tugas: Maksimal 2 MB </label>
                            <input type="file" class="form-control" name="file_acc" id="file_acc">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-outline-success">Upload</button>
                </div>
                </form>
            </div>
        </div>
    </div>
@endforeach

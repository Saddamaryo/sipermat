<!--DELETE DATA SURAT MAHASISWA-->
@foreach ($pengajuansurat as $item)
    <!-- Delete Modal -->
    <div class="modal fade" id="delete{{ $item->id }}" tabindex="-1" aria-labelledby="myModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title" id="myModalLabel">Delete Pengajuan Surat Mahasiswa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('pengajuansuratmahasiswa/' . $item->id) }}" method="post">
                        @method('DELETE')
                        @csrf
                        <div class="mb-3">
                            <p>Apakah yakin surat untuk mahasiswa bernama {{ $item->nama_mahasiswa }},
                                {{ $item->prodi_mahasiswa }}, dan dengan NIM: {{ $item->nim_mahasiswa }} yang
                                mengajukan {{ $item->nama_surat }} untuk dihapus?...</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary"
                                data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-outline-danger">Delete</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endforeach

@foreach ($pengajuansurattugas as $item)
    <!-- Delete Modal -->
    <div class="modal fade" id="delete_tugas{{ $item->id }}" tabindex="-1" aria-labelledby="myModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title" id="myModalLabel">Delete Pengajuan Surat Mahasiswa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('delete_tugas', $item->id) }}" method="post"
                        enctype="multipart/form-data">
                        @method('DELETE')
                        @csrf
                        <div class="mb-3">
                            <p>Apakah yakin surat untuk mahasiswa bernama {{ $item->nama_mahasiswa }},
                                {{ $item->prodi_mahasiswa }}, dan dengan NIM: {{ $item->nim_mahasiswa }} yang
                                mengajukan {{ $item->nama_surat }} untuk dihapus?...</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary"
                                data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-outline-danger">Delete</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endforeach




<!--REJECT DATA SURAT MAHASISWA-->
@foreach ($pengajuansurat as $item)
    <div class="modal fade" id="rejectsuratmhs{{ $item->id }}" aria-hidden="true"
        aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h1 class="modal-title fs-5" id="exampleModalToggleLabel2">Reject Data Surat Mahasiswa</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('rejecting_surat/' . $item->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="status" value="Ditolak" id="status">

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
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary"
                        data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-outline-danger">Reject</button>
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
                    <h1 class="modal-title fs-5" id="exampleModalToggleLabel2">Reject Data Surat Mahasiswa</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('rejecting_tugas/' . $item->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="status" value="Ditolak" id="status">

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

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary"
                        data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-outline-danger">Reject</button>
                </div>
                </form>
            </div>
        </div>
    </div>
@endforeach


<div class="modal fade" id="Tambaharsipsurattugas" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalToggleLabel2">Tambah Arsip Surat Menyurat Mahasiswa</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ url('tambaharsipsurattugas') }}" method="post" enctype="multipart/form-data">
                    @method('POST')
                    @csrf
                    <input type="hidden" value="Arsip" name="status" id="status">

                    <div class="mb-3">
                        <label for="" class="col-form-label">Nama Surat</label>
                        <input type="text" class="form-control" name="nama_surat" required>
                    </div>
                    <div class="mb-3">
                        <label for="" class="col-form-label">Kode Surat</label>
                        <input type="text" class="form-control" name="nomor_surat" required>
                    </div>
                    <div class="mb-3">
                        <label for="" class="col-form-label">Nomor Urut Surat</label>
                        <input type="number" class="form-control" name="nomor_urut" value = "{{$lastNomorUrutTugas +=1}}"
                            required>
                    </div>
                    <div class="mb-3">
                        <label for="" class="col-form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" id="nama_mahasiswa" required name="nama_mahasiswa">
                    </div>
                    <div class="mb-3">
                        <label for="" class="col-form-label">Program Studi</label>
                        <select class="form-select" id="prodi_mahasiswa" name="prodi_mahasiswa" required>
                            <option value="Pendidikan Matematika">Pendidikan Matematika</option>
                            <option value="Matematika">Matematika</option>
                            <option value="Statistika">Statistika</option>
                            <option value="Ilmu Komputer">Ilmu Komputer</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="" class="col-form-label">Nomor Registrasi</label>
                        <input type="text" class="form-control" id="nim_mahasiswa" required name="nim_mahasiswa">
                    </div>
                    <div class="mb-3">
                        <label for="r" class="col-form-label">Tanggal Dikeluarkan Surat</label>
                        <input type="date" class="form-control" id="formulir1" required name="formulir1">
                    </div>
                    <div class="mb-3">
                        <label for="r" class="col-form-label">Keterangan Lainnya</label>
                        <input type="text" class="form-control" id="formulir2" required name="formulir2">
                    </div>
                    <div class="mb-3">
                        <label for="" class="col-form-label">File Surat: Maksimal 2Mb</label>
                        <input type="file" class="form-control" id="file_acc" name="file_acc" required>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-outline-primary">Submit</button>
            </div>
            </form>
        </div>
    </div>
</div>


@foreach ($pengarsipansurattugas as $item)
    <!-- Delete Modal -->
    <div class="modal fade" id="deletearsipsurattugas{{ $item->id }}" tabindex="-1" aria-labelledby="myModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title" id="myModalLabel">Delete Data Pimpinan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{url('deletearsipsurattugas/'.$item->id)}}" method="post">
                        @method('DELETE')
                        @csrf
                        <div class="mb-3">
                            <p>Apakah yakin surat dengan {{$item->nama_surat}} untuk dihapus?...</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-outline-danger">Delete</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endforeach


<!--FORM MODAL TAMBAH DATA-->
<div class="modal fade" id="modal_tambahpimpinan" tabindex="-1" data-bs-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h1 class="modal-title fs-5">Tambah Data Pimpinan</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="formTambahPimpinan" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Nama Pimpinan</label>
                        <input type="text" class="form-control" id="nama_pimpinan" name="nama_pimpinan" value="{{ old('nama_pimpinan') }}">
                    </div>
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">NIP/Nomor Induk Pengajar Pimpinan</label>
                        <input type="text" class="form-control" id="nip_pimpinan" name="nip_pimpinan" value="{{ old('nip_pimpinan') }}">
                    </div>
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Jabatan Pimpinan</label>
                        <input type="text" class="form-control" id="jabatan_pimpinan" name="jabatan_pimpinan" value="{{ old('jabatan_pimpinan') }}">
                    </div>
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Slug Jabatan</label>
                        <input type="text" class="form-control" id="slug_jabatan" name="slug_jabatan" value="{{ old('slug_jabatan') }}">
                    </div>
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Prodi Pimpinan</label>
                        <input type="text" class="form-control" id="prodi_pimpinan" name="prodi_pimpinan" value="{{ old('prodi_pimpinan') }}">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            </form>
        </div>
    </div>
</div>
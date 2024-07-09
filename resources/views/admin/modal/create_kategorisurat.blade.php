            <!--FORM MODAL TAMBAH DATA-->
            <div class="modal fade" id="modal_tambahkategorisurat" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header bg-success text-white">
                            <h1 class="modal-title fs-5">Tambah Data Surat</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ url('kategorisurat') }}" method="post">
                                @csrf
                                <div class="mb-3">
                                    <label for="" class="col-form-label">Nama Surat</label>
                                    <input type="text" class="form-control" name="nama_surat" id="nama_surat">
                                </div>
                                <div class="mb-3">
                                    <label for="" class="col-form-label">Nomor Surat</label>
                                    <input type="text" class="form-control" name="nomor" id="nomor">
                                </div>
                                <div class="mb-3">
                                    <label for="" class="col-form-label">Singkatan</label>
                                    <input type="text" class="form-control" id="slug" name="slug">
                                </div>
                                <div class="mb-3">
                                    <label for="" class="col-form-label">Deskripsi</label>
                                    <input type="text" class="form-control" id="deskripsi_surat" name="deskripsi_surat">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                                </div>
                            </form>
                        </div>
                       
                    </div>
                </div>
            </div>
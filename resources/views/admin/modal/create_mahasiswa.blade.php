            <!--FORM MODAL TAMBAH DATA BIASA-->
            <div class="modal fade" id="modal_tambahmhs" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header bg-success text-white">
                            <h1 class="modal-title fs-5">Tambah Data Mahasiswa</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ url('mahasiswa') }}" method="post">
                                @csrf
                                <div class="mb-3">
                                    <label for="" class="col-form-label">Nama Mahasiswa</label>
                                    <input type="text" class="form-control" name="nama_mahasiswa"
                                        id="nama_mahasiswa">
                                </div>
                                <div class="mb-3">
                                    <label for="" class="col-form-label">Nomor Induk
                                        Mahasiswa/NIM</label>
                                    <input type="text" class="form-control" name="nim_mahasiswa" id="nim_mahasiswa">
                                </div>
                                <div class="mb-3">
                                    <label for="" class="col-form-label">Program Studi</label>
                                    <select class="form-select" id="prodi_mahasiswa" name="prodi_mahasiswa">
                                        <option value="Pendidikan Matematika">Pendidikan Matematika</option>
                                        <option value="Matematika">Matematika</option>
                                        <option value="Statistika">Statistika</option>
                                        <option value="Ilmu Komputer">Ilmu Komputer</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="col-form-label">E-Mail Mahasiswa</label>
                                    <input type="text" class="form-control" id="email" name="email">
                                </div>
                                <div class="mb-3">
                                    <label for="" class="col-form-label">Password</label>
                                    <input type="text" class="form-control" id="password" name="password">
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




             <!--FORM MODAL TAMBAH DATA MASAL-->
             <div class="modal fade" id="tambah_mhsmasal" tabindex="-1" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
             <div class="modal-dialog">
                 <div class="modal-content">
                     <div class="modal-header bg-success text-white">
                         <h1 class="modal-title fs-5">Tambah Data Masal Mahasiswa</h1>
                         <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                     </div>
                     <div class="modal-body">
                         <form action="{{ url('importmhs') }}" method="post" enctype="multipart/form-data">
                             @csrf
                             <div class="mb-3">
                                 <label for="" class="col-form-label">Input File Excel: tipe file xls, xlsx</label>
                                 <input type="file" class="form-control" name="file_mahasiswa"
                                     id="file_mahasiswa">
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
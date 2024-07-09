 <!--FORM MODAL TAMBAH DATA KAPRODI-->
 <div class="modal fade" id="modal_tambahkaprodi" tabindex="-1" data-bs-backdrop="static">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header bg-success text-white">
                 <h1 class="modal-title fs-5 ">Tambah Data Koordinator Program Studi</h1>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <div class="modal-body">
                 <form action="{{ url('datakaprodi') }}" method="post" enctype="multipart/form-data">
                     @csrf
                     <div class="mb-3">
                         <label for="recipient-name" class="col-form-label">Nama Koordinator Program Studi</label>
                         <input type="text" class="form-control" id="nama_kaprodi" name="nama_kaprodi"
                             value="{{ old('nama_kaprodi') }}">
                     </div>
                     <div class="mb-3">
                         <label for="recipient-name" class="col-form-label">E-Mail Koordinator Program Studi</label>
                         <input type="text" class="form-control" id="email_admin" name="email"
                             value="{{ old('email') }}">
                     </div>
                     <div class="mb-3">
                         <label for="recipient-name" class="col-form-label">NIP Koordinator Program Studi</label>
                         <input type="text" class="form-control" id="nip_kaprodi" name="nip_kaprodi"
                             value="{{ old('nip_kaprodi') }}">
                     </div>
                     <div class="mb-3">
                         <label for="" class="col-form-label">Program Studi</label>
                         <select class="form-select" id="prodi_kaprodi" name="prodi_kaprodi">
                             <option value="Pendidikan Matematika">Pendidikan Matematika</option>
                             <option value="Matematika">Matematika</option>
                             <option value="Statistika">Statistika</option>
                             <option value="Ilmu Komputer">Ilmu Komputer</option>
                         </select>
                     </div>
                     <div class="mb-3">
                         <label for="recipient-name" class="col-form-label">Password</label>
                         <input type="password" class="form-control" id="password" name="password"
                             value="{{ old('password') }}">
                     </div>
                     <div class="mb-3">
                         <label for="recipient-name" class="col-form-label">File Tanda Tangan Kaprodi</label>
                         <input type="file" class="form-control" id="file_ttd" name="file_ttd">
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

 <!--FORM EDIT DATA KAPRODI-->
 @foreach ($kaprodi as $item)
     <div class="modal fade" id="edit{{ $item->id }}" tabindex="-1" data-bs-backdrop="static">
         <div class="modal-dialog">
             <div class="modal-content">
                 <div class="modal-header bg-primary text-white">
                     <h1 class="modal-title fs-5 ">Edit Data Koordinator Program Studi</h1>
                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                 </div>
                 <div class="modal-body">
                     <form action="{{ url('datakaprodi/' . $item->id) }}" method="post" enctype="multipart/form-data">
                         @csrf
                         @method('PUT')
                         <div class="mb-3">
                             <label for="recipient-name" class="col-form-label">Nama Koordinator Program Studi</label>
                             <input type="text" class="form-control" id="nama_kaprodi" name="nama_kaprodi"
                                 value="{{ $item->nama_kaprodi }}" required>
                         </div>
                         <div class="mb-3">
                             <label for="recipient-name" class="col-form-label">E-Mail Koordinator Program Studi</label>
                             <input type="text" class="form-control" id="email_admin" name="email"
                                 value="{{ $item->email }}" required>
                         </div>
                         <div class="mb-3">
                             <label for="recipient-name" class="col-form-label">NIP Koordinator Program Studi</label>
                             <input type="text" class="form-control" id="nip_kaprodi" name="nip_kaprodi"
                                 value="{{ $item->nip_kaprodi }}" required>
                         </div>
                         <div class="mb-3">
                            <label for="" class="col-form-label">Program Studi Koordinator Prodi</label>
                            <select class="form-select" id="prodi_kaprodi" name="prodi_kaprodi" required>
                                <option value="Pendidikan Matematika" {{ $item->prodi_kaprodi == 'Pendidikan Matematika' ? 'selected' : '' }}>Pendidikan Matematika</option>
                                <option value="Matematika" {{ $item->prodi_kaprodi == 'Matematika' ? 'selected' : '' }}>Matematika</option>
                                <option value="Statistika" {{ $item->prodi_kaprodi == 'Statistika' ? 'selected' : '' }}>Statistika</option>
                                <option value="Ilmu Komputer" {{ $item->prodi_kaprodi == 'Ilmu Komputer' ? 'selected' : '' }}>Ilmu Komputer</option>
                            </select>
                        </div>  
                         <div class="mb-3">
                             <label for="recipient-name" class="col-form-label">Password</label>
                             <input type="password" class="form-control" id="password" name="password"
                                 value="{{ $item->password }}" required>
                         </div>
                         <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Tanda Tangan Kaprodi</label>
                            <iframe src="{{ asset('storage/file_ttd/' . $item->file_ttd) }}" frameborder="0"></iframe>
                         </div>
                         <div class="mb-3">
                             <label for="recipient-name" class="col-form-label">File Tanda Tangan Kaprodi</label>
                             <input type="file" class="form-control" id="password" name="file_ttd">
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
 @endforeach

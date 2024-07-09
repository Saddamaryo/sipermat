 <!--FORM MODAL TAMBAH ARSIP SURAT MASUK-->
 <div class="modal fade" id="modal_suratmasuk" tabindex="-1" data-bs-backdrop="static">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header bg-success text-white">
                 <h1 class="modal-title fs-5 ">Tambah Data Arsip Surat Masuk</h1>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <div class="modal-body">
                 <form action="{{ url('suratmasuk') }}" method="post" enctype="multipart/form-data">
                     @csrf
                     <div class="mb-3">
                         <label for="recipient-name" class="col-form-label">Nama Pemilik Surat</label>
                         <input type="text" class="form-control" id="nama_mahasiswa" name="nama_mahasiswa"
                             value="{{ old('nama_mahasiswa') }}">
                     </div>
                     <div class="mb-3">
                         <label for="recipient-name" class="col-form-label">Nama Surat</label>
                         <input type="text" class="form-control" id="nama_surat" name="nama_surat"
                             value="{{ old('nama_surat') }}">
                     </div>
                     <div class="mb-3">
                         <label for="recipient-name" class="col-form-label">Program Studi Pemilik</label>
                         <select class="form-select" id="prodi_mahasiswa" name="prodi_mahasiswa">
                             <option value="Pendidikan Matematika">Pendidikan Matematika</option>
                             <option value="Matematika">Matematika</option>
                             <option value="Statistika">Statistika</option>
                             <option value="Ilmu Komputer">Ilmu Komputer</option>
                         </select>
                     </div>
                     <div class="mb-3">
                         <label for="recipient-name" class="col-form-label">Nomor Handphone Pemilik</label>
                         <input type="text" class="form-control" id="nomor_user" name="nomor_user"
                             value="{{ old('nomor_user') }}">
                     </div>
                     <div class="mb-3">
                         <label for="recipient-name" class="col-form-label">NIM/NIP Pemilik Surat</label>
                         <input type="text" class="form-control" id="nim_mahasiswa" name="nim_mahasiswa"
                             value="{{ old('nim_mahasiswa') }}">
                     </div>
                     <div class="mb-3">
                         <label for="recipient-name" class="col-form-label">Keterangan</label>
                         <input type="text" class="form-control" id="formulir1" name="formulir1"
                             value="{{ old('formulir1') }}">
                     </div>
                     <div class="mb-3">
                         <label for="recipient-name" class="col-form-label">File Surat Masuk: maksimal 2Mb</label>
                         <input type="file" class="form-control" id="file_suratmasuk" name="file_suratmasuk"
                             value="{{ old('file_suratmasuk') }}">
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


 <!--EDIT DATA SURAT MASUK-->
 @foreach ($suratmasuk as $item)
     <div class="modal fade" id="edit{{ $item->id }}" tabindex="-1" data-bs-backdrop="static">
         <div class="modal-dialog">
             <div class="modal-content">
                 <div class="modal-header bg-success text-white">
                     <h1 class="modal-title fs-5 ">Edit Data Arsip Surat Masuk</h1>
                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                 </div>
                 <div class="modal-body">
                     <form action="{{ url('suratmasuk/' . $item->id) }}" method="POST" enctype="multipart/form-data">
                         @csrf
                         @method('PUT')
                         <div class="mb-3">
                             <label for="recipient-name" class="col-form-label">Nama Pemilik Surat</label>
                             <input type="text" class="form-control" id="nama_mahasiswa" name="nama_mahasiswa"
                                 value="{{ $item->nama_mahasiswa }}">
                         </div>
                         <div class="mb-3">
                             <label for="recipient-name" class="col-form-label">Nama Surat</label>
                             <input type="text" class="form-control" id="nama_surat" name="nama_surat"
                                 value="{{ $item->nama_surat }}">
                         </div>
                         <div class="mb-3">
                             <label for="recipient-name" class="col-form-label">Program Studi Pemilik</label>
                             <select class="form-select" id="prodi_mahasiswa" name="prodi_mahasiswa"
                                 value="{{ $item->prodi_mahasiswa }}">
                                 <option value="Pendidikan Matematika">Pendidikan Matematika</option>
                                 <option value="Matematika">Matematika</option>
                                 <option value="Statistika">Statistika</option>
                                 <option value="Ilmu Komputer">Ilmu Komputer</option>
                             </select>
                         </div>
                         <div class="mb-3">
                             <label for="recipient-name" class="col-form-label">Nomor Handphone Pemilik</label>
                             <input type="text" class="form-control" id="nomor_user" name="nomor_user"
                                 value="{{ $item->nomor_user }}">
                         </div>
                         <div class="mb-3">
                             <label for="recipient-name" class="col-form-label">NIM/NIP Pemilik Surat</label>
                             <input type="text" class="form-control" id="nim_mahasiswa" name="nim_mahasiswa"
                                 value="{{ $item->nim_mahasiswa }}">
                         </div>
                         <div class="mb-3">
                             <label for="recipient-name" class="col-form-label">Keterangan</label>
                             <input type="text" class="form-control" id="formulir1" name="formulir1"
                                 value="{{ $item->formulir1 }}">
                         </div>
                         <div class="mb-3">
                             <label for="recipient-name" class="col-form-label">File Surat Masuk</label>
                             <input type="file" class="form-control" id="file_suratmasuk" name="file_suratmasuk"
                                 value="{{ old('file_suratmasuk') }}">
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


 @foreach ($suratmasuk as $item)
     <!-- Delete Modal -->
     <div class="modal fade" id="delete{{ $item->id }}" tabindex="-1" aria-labelledby="myModalLabel"
         aria-hidden="true">
         <div class="modal-dialog">
             <div class="modal-content">
                 <div class="modal-header bg-danger text-white">
                     <h5 class="modal-title" id="myModalLabel">Delete Data Surat</h5>
                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                 </div>
                 <div class="modal-body">
                     <form action="{{ url('suratmasuk/' . $item->id) }}" method="post">
                         @method('DELETE')
                         @csrf
                         <div class="mb-3">
                             <p>Apakah yakin untuk surat dengan pemilik bernama {{ $item->nama_mahasiswa }} untuk
                                 dihapus?...</p>
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

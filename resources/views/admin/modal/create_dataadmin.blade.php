 <!--FORM MODAL TAMBAH DATA-->
 <div class="modal fade" id="modal_tambahadmin" tabindex="-1" data-bs-backdrop="static">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header bg-success text-white">
                 <h1 class="modal-title fs-5 ">Tambah Data Pimpinan</h1>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <div class="modal-body">
                 <form action="{{ url('dataadmin') }}" method="post">
                     @csrf
                     <div class="mb-3">
                         <label for="recipient-name" class="col-form-label">Nama Admin</label>
                         <input type="text" class="form-control" id="nama_admin" name="nama_admin"
                             value="{{ old('nama_admin') }}" required>
                     </div>
                     <div class="mb-3">
                         <label for="recipient-name" class="col-form-label">E-Mail Admin</label>
                         <input type="text" class="form-control" id="email_admin" name="email"
                             value="{{ old('email') }}" required>
                     </div>
                     <div class="mb-3">
                         <label for="recipient-name" class="col-form-label">Nomor Handphone</label>
                         <input type="text" class="form-control" id="nomor_admin" name="nomor_admin"
                             value="{{ old('nomor_admin') }}" required>
                     </div>
                     <div class="mb-3">
                         <label for="recipient-name" class="col-form-label">Password</label>
                         <input type="password" class="form-control" id="password" name="password"
                             value="{{ old('password') }}" required>
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

<!-- EDIT DATA & RESET PASSWORD ADMIN -->
@foreach ($dataadmin as $item)
    <div class="modal fade" id="edit{{ $item->id }}" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="myModalLabel">Edit Data Admin</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('dataadmin/' . $item->id) }}" method="post">
                        @method('PUT')
                        @csrf
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Nama Admin</label>
                            <input type="text" class="form-control" id="nama_admin" name="nama_admin"
                                value="{{ old('nama_admin', $item->nama_admin) }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">E-Mail</label>
                            <input type="text" class="form-control" id="email_admin" name="email"
                                value="{{ old('email', $item->email) }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Nomor Handphone</label>
                            <input type="text" class="form-control" id="nomor_admin" name="nomor_admin"
                                value="{{ old('nomor_admin', $item->nomor_admin) }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" value="{{ old('nomor_admin', $item->nomor_admin) }}" required>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-outline-primary">Edit</button>
                </div>
                </form>
            </div>
        </div>
    </div>
@endforeach



<!--DELETE DATA ADMIN-->
@foreach ($dataadmin as $item)
    <!-- Delete Modal -->
    <div class="modal fade" id="delete{{ $item->id }}" tabindex="-1" aria-labelledby="myModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title" id="myModalLabel">Delete Data Admin</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{url('dataadmin/'.$item->id)}}" method="post">
                        @method('DELETE')
                        @csrf
                        <div class="mb-3">
                            <p>Apakah yakin untuk admin dengan nama {{$item->nama_admin}} untuk dihapus?...</p>
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


<!-- EDIT DATA MAHASISWA & RESET PASSWORD SISI ADMIN -->
@foreach ($user as $item)
    <div class="modal fade" id="edit{{ $item->id }}" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="myModalLabel">Edit Mahasiswa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('mahasiswa/' . $item->id) }}" method="post">
                        @method('PUT')
                        @csrf
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Nama Mahasiswa</label>
                            <input type="text" class="form-control" id="nama_mahasiswa" name="nama_mahasiswa"
                                value="{{ old('nama_mahasiswa', $item->nama_mahasiswa) }}">
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">NIM/Nomor Induk Mahasiswa</label>
                            <input type="text" class="form-control" id="nim_mahasiswa" name="nim_mahasiswa"
                                value="{{ old('nim_mahasiswa', $item->nim_mahasiswa) }}">
                        </div>
                        <div class="mb-3">
                            <label for="" class="col-form-label">Program Studi</label>
                            <select class="form-select" id="prodi_mahasiswa" name="prodi_mahasiswa">
                                <option value="Pendidikan Matematika" {{ $item->prodi_mahasiswa == 'Pendidikan Matematika' ? 'selected' : '' }}>Pendidikan Matematika</option>
                                <option value="Matematika" {{ $item->prodi_mahasiswa == 'Matematika' ? 'selected' : '' }}>Matematika</option>
                                <option value="Statistika" {{ $item->prodi_mahasiswa == 'Statistika' ? 'selected' : '' }}>Statistika</option>
                                <option value="Ilmu Komputer" {{ $item->prodi_mahasiswa == 'Ilmu Komputer' ? 'selected' : '' }}>Ilmu Komputer</option>
                            </select>
                        </div>                        
                        <div class="mb-3">
                            <label for="" class="col-form-label">E-Mail Mahasiswa</label>
                            <input type="text" class="form-control" id="email_mahasiswa" name="email"value="{{ old('email', $item->email) }}">
                        </div>
                        <div class="mb-3">
                            <label for="" class="col-form-label">Password</label>
                            <input type="text" class="form-control" id="password_mahasiswa"
                                name="password" value="{{ old('password', $item->password) }}">
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



<!--DELETE DATA MAHASISWA-->
@foreach ($user as $item)
    <!-- Delete Modal -->
    <div class="modal fade" id="delete{{ $item->id }}" tabindex="-1" aria-labelledby="myModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title" id="myModalLabel">Delete</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('mahasiswa/' . $item->id) }}" method="post">
                        @method('DELETE')
                        @csrf
                        <div class="mb-3">
                            <p>Apakah yakin untuk mahasiswa dengan nama {{ $item->nama_mahasiswa }} untuk dihapus?...</p>
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

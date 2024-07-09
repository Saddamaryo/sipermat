<!-- Edit Modal -->
@foreach ($pimpinan as $item)
    <div class="modal fade" id="edit{{ $item->id }}" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="myModalLabel">Edit Pimpinan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('pimpinan/' . $item->id) }}" method="post">
                        @method('PUT')
                        @csrf
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Nama Pimpinan</label>
                            <input type="text" class="form-control" id="nama_pimpinan" name="nama_pimpinan"
                                value="{{ old('nama_pimpinan', $item->nama_pimpinan) }}">
                        </div>
                        @if ($item->nip_pimpinan !=null)
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">NIP/Nomor Induk Pengajar Pimpinan</label>
                            <input type="text" class="form-control" id="nip_pimpinan" name="nip_pimpinan"
                                value="{{ old('nip_pimpinan', $item->nip_pimpinan) }}">
                        </div>
                        @endif
                        
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Jabatan Pimpinan</label>
                            <input type="text" class="form-control" id="jabatan_pimpinan" name="jabatan_pimpinan"
                                value="{{ old('jabatan_pimpinan', $item->jabatan_pimpinan) }}">
                        </div>

                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Singkatan</label>
                            <input type="text" class="form-control" id="jabatan_pimpinan" name="slug_jabatan"
                                value="{{ old('slug_jabatan', $item->slug_jabatan) }}">
                        </div>

                        @if ($item->prodi_pimpinan !=null)
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Prodi Pimpinan</label>
                            <input type="text" class="form-control" id="prodi_pimpinan" name="prodi_pimpinan"
                                value="{{ old('prodi_pimpinan', $item->prodi_pimpinan) }}">
                        </div>
                        @endif
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


@foreach ($pimpinan as $item)
    <!-- Delete Modal -->
    <div class="modal fade" id="delete{{ $item->id }}" tabindex="-1" aria-labelledby="myModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title" id="myModalLabel">Delete Data Pimpinan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{url('pimpinan/'.$item->id)}}" method="post">
                        @method('DELETE')
                        @csrf
                        <div class="mb-3">
                            <p>Apakah yakin untuk pimpinan dengan nama {{$item->nama_pimpinan}} untuk dihapus?...</p>
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


<!-- EDIT DATA SURAT -->
@foreach ($kategorisurat as $item)
    <div class="modal fade" id="edit{{ $item->id }}" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="myModalLabel">Edit Data & Kategori Surat</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('kategorisurat/' . $item->id) }}" method="post" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Nama Surat</label>
                            <input type="text" class="form-control" id="nama_surat" name="nama_surat"
                                value="{{ old('nama_surat', $item->nama_surat) }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Nomor Surat</label>
                            <input type="text" class="form-control" id="nomor" name="nomor"
                                value="{{ old('nomor', $item->nomor) }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Deskripsi</label>
                            <input type="text" class="form-control" id="deskripsi_surat" name="deskripsi_surat"
                                value="{{ old('deskripsi_surat', $item->deskripsi_surat) }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">File Template Surat: tipe file = PDF</label>
                            <input type="file" class="form-control" id="deskripsi_surat" name="template_surat" >
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



<!--DELETE DATA SURAT-->
@foreach ($kategorisurat as $item)
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
                    <form action="{{url('kategorisurat/'.$item->id)}}" method="post">
                        @method('DELETE')
                        @csrf
                        <div class="mb-3">
                            <p>Apakah yakin untuk pimpinan dengan nama {{$item->nomor_surat}} untuk dihapus?...</p>
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


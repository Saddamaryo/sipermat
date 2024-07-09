<div class="modal fade" id="updatepassword{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h5 class="modal-title text-white" id="exampleModalLabel">Edit Password</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('changepassword')}}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Password
                            lama:</label>
                        <input type="password" class="form-control" id="recipient-name" name="old_password">
                    </div>
                    <div class="mb-3">
                        <label for="message-text" class="col-form-label">Password
                            baru: min 8 karakter</label>
                        <input type="password" class="form-control" id="message-text" name="new_password">
                    </div>
                    <div class="mb-3">
                        <label for="message-text1" class="col-form-label">Masukan kembali
                            password baru:</label>
                        <input type="password" class="form-control" id="message-text1" name="new_password_confirmation">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-outline-primary">Edit</button>
            </div>
            </form>
        </div>
    </div>
</div>

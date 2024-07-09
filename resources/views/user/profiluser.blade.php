@extends('layout.userpanel')

@section('kontenuser')
    <!--Main-->
    <main id="content">
        <div class="container mt-5 mb-5">
            @foreach ($tampilprofil as $item)
            <div class="row">
                <div class="col-md-3 border-right">
                    <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                        <img class="profile-img"
                            src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg" alt="Profile Picture">
                        <div class="profile-info">
                            <span>{{ $item->nama_mahasiswa }}</span>
                            <span class="text-black-50">{{ $item->prodi_mahasiswa }}</span>
                            <span class="text-black-50">{{ $item->nim_mahasiswa }}</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-5 border-right">
                    <div class="profile-settings">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4>Profile Settings</h4>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12 mb-3">
                                <label class="labels">Nama Lengkap</label>
                                <input type="text" class="form-control" placeholder="{{ $item->nama_mahasiswa }}" name="nama_mahasiswa" disabled>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="labels">Nomor Induk Mahasiswa/NIM</label>
                                <input type="text" class="form-control" placeholder="{{ $item->nim_mahasiswa }}" name="nim_mahasiswa" disabled>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="labels">Program Studi</label>
                                <input type="text" class="form-control" placeholder="{{ $item->prodi_mahasiswa }}" name="prodi_mahasiswa" disabled>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="labels">E-Mail</label>
                                <input type="text" class="form-control" placeholder="{{ $item->email }}" name="email" disabled>
                            </div>
                        </div>
                        <div class="btn-edit-password">
                            <button class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#updatepassword{{$item->id}}">Edit Password</button>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

    </main>
    @include('user.modal.action_resetpassword')
@endsection

@extends('layout.userpanel')

@section('kontenuser')
    <!--Main-->
    <main id="content">
        <br>
        <div class="text-products row align-items-center">
            <div class="title-product col text-center">
                <h2 class="text-main"><strong>Detail dan Pengajuan Surat</strong></h2>
            </div>
        </div>
        <br>
        <div class="container container-custom">
            <div class="row">
                <div class="col-md-8 col-12">
                    <div class="card-custom">
                        @if ($data->template_surat)
                            <h4 class="text-main text-center"><strong>Contoh Surat dan Contoh Pengisian Data Pengajuan</strong></h4>
                            <div class="embed-responsive embed-responsive-16by9">
                                <object class="embed-responsive-item"
                                    data="{{ asset('storage/template_surat/' . $data->template_surat) }}" width="100%" height="800"></object>
                            </div>
                            <br>
                        @else
                            <p>File tidak ditemukan.</p>
                        @endif
                    </div>
                </div>
                <div class="col-md-4 col-12">
                    <div class="p-3 py-5 card-custom">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="text-main">{{ $data->nama_surat }}</h4>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12">
                                <label class="form-label">{{ $data->deskripsi_surat }}</label>
                            </div>
                            @if ($data->slug == 's-skrip' || $data->slug == 's-laintugas')
                                <div class="mt-5 text-center">
                                    <button class="btn btn-custom" data-bs-toggle="modal"
                                        data-bs-target="#modal_pengajuansurattugas">Buat Pengajuan</button><br>
                                </div>
                            @else
                                <div class="mt-5 text-center">
                                    <button class="btn btn-custom" data-bs-toggle="modal"
                                        data-bs-target="#modal_pengajuansurat">Buat Pengajuan</button><br>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <br>
        <br>
    
        @include('user.modal.create_suratmhs')
    </main>
    
@endsection

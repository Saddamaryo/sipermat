@extends('layout.userpanel')

@section('kontenuser')
    <!--MAIN-->
    <main id="content">
        <br>
        <div class="text-products row align-items-center">
            <div class="title-product col text-center">
                <h2 class="text-main"><strong>Panduan Penggunaan dan Template Surat</strong></h2>
            </div>
        </div>
        <br>
        <div class="container container-custom">
            <div class="row">
                <div class="col-md-8 col-12">
                    <div class="card-custom">
                        <br>
                        <div class="embed-responsive embed-responsive-16by9">
                            <object class="embed-responsive-item"
                                data="{{ asset('storage/pdf/Panduanpenggunaansipermat.pdf') }}" width="100%"
                                height="800"></object>
                        </div>
                        <br>
                    </div>
                </div>
                <div class="col-md-4 col-12">
                    <div class="p-3 py-5 card-custom">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="text-main justify-center">Template Surat</h4>
                        </div>
                        <div class="row mt-3">
                            @foreach ($kategorisurat as $item)
                                <div class="mt-5 text-center">
                                    @if ($item->template_surat == null)
                                    @else
                                        <a href="{{ url('/download-template', $item->id) }}"
                                            class="btn btn-outline-dark">{{ $item->nama_surat }}</a>
                                    @endif

                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <br>


    </main>
@endsection

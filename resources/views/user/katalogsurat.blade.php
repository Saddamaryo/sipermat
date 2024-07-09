@extends('layout.userpanel')

@section('kontenuser')
    <main id="content">
        <!-- Catalogues -->
        <section class="catalogues">
            <div class="container">
                <div class="text-products row align-items-center">
                    <div class="title-product col text-center">
                        <br>
                        <h2 class="text-main">Kategori Surat</h2>
                    </div>
                </div>
                <!--<div class="products row justify-content-center">
                            @foreach ($kategorisurat as $item)
    <div class="product col-12 col-sm-12 col-md-6 col-lg-3 mb-md-4 md-lg-0" data-aos="fade-up">
                                    <div class="bg-white">
                                        <div class="desc-product">
                                            <p class="text-main">{{ $item->nama_surat }}</p>
                                            <br>
                                            <p class="text-second">{{ $item->deskripsi_surat }}</p>
                                            <a href="{{ url('details', $item->id) }}" class="btn btn-danger">Ajukan</a>
                                        </div>
                                    </div>
                                </div>
    @endforeach
                        </div>-->

                <div class="ag-format-container">
                    <div class="ag-courses_box">
                        @foreach ($kategorisurat as $item)
                            <div class="ag-courses_item">
                                <a href="{{ url('details', $item->id) }}" class="ag-courses-item_link no-page-refresh" >
                                    <div class="ag-courses-item_bg"></div>

                                    <div class="ag-courses-item_title">
                                        {{ $item->nama_surat }}
                                    </div>

                                    <div class="ag-courses-item_date-box">
                                        <span class="ag-courses-item_date">
                                            Ajukan
                                        </span>
                                    </div>
                                </a>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
            </div>
        </section>
    </main>
@endsection

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <title>Document</title>
    <style type="text/css">
        body {
            font-family: 'Times New Roman', Times, serif;
            background-color: white;

        }

        .sheet-outer {
            margin: 0;
        }

        .sheet {
            margin: 0;
            overflow: hidden;
            position: relative;
            box-sizing: border-box;

        }

        .pagebreak {
            page-break-after: always;
        }

        @media screen {
            body {
                background: white
            }

            .sheet {
                background: white;
                margin: 5mm auto;
            }
        }

        .sheet-outer.A4 .sheet {
            width: 210mm;
            height: 296mm
        }

        .sheet.padding-5mm {
            padding: 5mm
        }

        @page {
            size: A4;
            margin: 0
        }

        @media print {

            .sheet-outer.A4,
            .sheet-outer.A5.landscape {
                width: 210mm
            }
        }

        .kopsurat {
            width: auto;
            background-color: white;
            border-bottom: 3px solid #000;
            margin-top: 1.0cm;
            margin-right: 1.0cm;
            margin-left: 1.0cm;
        }


        .kartu {
            margin-top: 0.5cm;
            margin-left: 1.25cm;
            justify-content: center;
            width: 80%;
            border-top: 1px solid black !important;
            border-left: 1px solid black !important;
            font-size: 12pt !important
        }

        .kartu thead {
            border-bottom: 1px solid black;
        }

        .kartu tr th {
            text-align: center;
            font-weight: normal;
            padding-left: 5px;
            padding-top: 12px;
            padding-bottom: 8px;
            border-top: 1px solid black !important;
            border-right: 1px solid black;
            font-weight: 500
        }

        .kartu tr td {
            text-align: center;
            font-weight: normal;
            border-bottom: 1px solid black;
            border-right: 1px solid black;
            vertical-align: top;
        }

        .tengah {
            text-align: center;
        }

        .tengah .kementrian {
            font-weight: light;
            font-size: 16pt;
            line-height: 1;
        }

        .tengah .univ {
            font-size: 12pt;
            text-transform: uppercase;
            line-height: 1;
        }

        .tengah .universitas {
            font-size: 12pt;
            line-height: 1;
            font-weight: light;
        }

        .tengah .kampus {
            font-size: 11pt;
            font-weight: light;
            line-height: 1;
        }

        .content {
            margin-left: 2.5cm;
            margin-bottom: 0.25cm;
            margin-right: 1.75cm;
        }

        #tls {
            text-align: right;
        }

        .alamat-tujuan {
            text-align: left
        }

        #logo {
            margin: auto;
            margin-left: 50%;
            margin-right: auto;
        }

        #tgl-srt {
            text-align: left;
        }

        #tempat-tgl {
            text-align: left
        }

        #pembuka {
            text-align: justify
        }

        #penutup {
            text-align: justify
        }

        #camat {
            margin-left: 200px;
            text-align: left;
        }

        #nama-camat {
            margin-left: 200px;
            text-align: left;
        }

        #ttd {
            margin-left: 200px;
            text-align: left;
        
        }
    </style>
</head>


<!--SCRIPT FUNCTION UNTUK LOOPING MAHASISWA LEBIH DARI 1-->
@php
    $array_namamhs = [];
    if ($cekdata->nama_mahasiswa) {
        $array_namamhs = explode(';', $cekdata->nama_mahasiswa);
    }
@endphp

@php
    $array_nimmhs = [];
    if ($cekdata->nim_mahasiswa) {
        $array_nimmhs = explode(';', $cekdata->nim_mahasiswa);
    }
@endphp


<!--SCRIPT FUNCTION MENAMPILKAN DATA TTD-->
@php
    $imagePath = public_path('storage/file_ttd/' . $prodikaprodi->file_ttd);
    $imageData = base64_encode(file_get_contents($imagePath));
    $image = 'data:image/' . mime_content_type($imagePath) . ';base64,' . $imageData;
@endphp

<body>

    @if (count($array_namamhs) != count($array_nimmhs))
        <h2 class="kementrian">Periksa kembali input nim dan namanya</h2>
    @else
        <!--MAKSIMAL 3 MAHASISWA-->
        @if (is_array($array_namamhs) && count($array_namamhs) < 4 && is_array($array_nimmhs) && count($array_nimmhs) < 4)
            <div class="sheet">
                <div class="kopsurat">
                    <table>
                        <tr>
                            <td>
                                <img src="{{ public_path('storage/image/logounj.png') }}" alt=""
                                    width="150px" height="160px">
                            </td>
                            <td class="tengah">
                                <h2 class="kementrian">KEMENTERIAN PENDIDIKAN, KEBUDAYAAN,</h2>
                                <h2 class="kementrian">RISET DAN TEKNOLOGI</h2>
                                <h3 class="kementrian">UNIVERSITAS NEGERI JAKARTA</h3>
                                <h3 class="univ">FAKULTAS MATEMATIKA DAN ILMU PENGETAHUAN ALAM</h3>
                                <h3 class="univ">PROGRAM STUDI {{ $cekdata->prodi_mahasiswa }}</h3>
                                <b class="kampus">Kampus A, Gedung Hasjim Asjarie Rawamangun, Jakarta Timur 13220
                                </b><br>
                                <b class="kampus">
                                    Telepon (021) 4894909, E-mail : <a href="">dekanfmipa@unj.ac.id </a>,
                                        <a href="">www.fmipa.unj.ac.id</a>
                                </b>
                                <br>
                            </td>
                        </tr>
                    </table>
                </div>

                <div class="content">
                    <div id="alamat" class="row">
                        <div id="lampiran" class="col-md-6">
                            <br>
                            <p id="tls">Jakarta, {{ $cekdata->created_at->locale('id')->isoFormat('LL') }}</p>
                            Nomor : @if ($cekdata->prodi_mahasiswa == 'Ilmu Komputer')
                                {{ $cekdata->nomor_urut }}/ILKOM/{{ $cekdata->nomor_surat }} <br />
                            @elseif ($cekdata->prodi_mahasiswa == 'Pendidikan Matematika')
                                {{ $cekdata->nomor_urut }}/PENMAT/{{ $cekdata->nomor_surat }}<br />
                            @elseif ($cekdata->prodi_mahasiswa == 'Matematika')
                                {{ $cekdata->nomor_urut }}/MAT/{{ $cekdata->nomor_surat }} <br />
                            @else
                                {{ $cekdata->nomor_urut }}/STAT/{{ $cekdata->nomor_surat }} <br />
                            @endif
                            Lampiran : - <br />
                            Perihal : Permohonan Surat Pengantar KKL
                            <br>
                            <br>
                        </div>
                        <div id="tgl-srt">

                            <p class="alamat-tujuan">Kepada<br />
                                {{ $jabatanpimpinan->jabatan_pimpinan }}<br />
                                {{ $jabatanpimpinan->nama_pimpinan }}<br />
                                Di tempat
                            </p>

                        </div>
                    </div>
                    <div id="pembuka">Dengan hormat,</div>
                    <br>
                    <div id="pembuka" class="row">Kami mengajukan permohonan untuk mendapatkan surat pengantar Kuliah Kerja Lapangan (KKL) bagi mahasiswa Program Studi {{$cekdata->prodi_mahasiswa}} di bawah ini:
                    </div>

                    <div id="tempat-tgl" class="kartu">
                        <table class="table table-bordered border-dark">
                            <tr>
                                <td>No</td>
                                <td>Nama</td>
                                <td>No. Reg</td>
                            </tr>
                            @for ($i = 0; $i < count($array_namamhs); $i++)
                                <tr>
                                    <td>{{ $i + 1 }}</td>
                                    <td>{{ $array_namamhs[$i] }}</td>
                                    <td>{{ $array_nimmhs[$i] }}</td>
                                </tr>
                            @endfor
                        </table>

                    </div>
                    <div id="tempat-tgl">

                        <table>
                            <tr>
                                <td>Tempat</td>
                                <td> :</td>
                                <td> {{ $cekdata->formulir1 }}</td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td> :</td>
                                <td> {{ $cekdata->formulir2 }}</td>
                            </tr>
                            <tr>
                                <td>Waktu Pelaksanaan</td>
                                <td> :</td>
                                <td> {{ $cekdata->formulir3 }}</td>
                            </tr>
                        </table>
                    </div>
                    <br>

                    <div id="penutup">Demikian permohonan ini kami sampaikan. Atas bantuan dan kerja samanya, kami
                        ucapkan
                        terima
                        kasih.</div>
                    <br>
                    <br>
                    <br>
                    <div id="ttd" class="row">
                        <div class="col-md-4">
                            @if ($prodikaprodi->prodi_kaprodi == 'Pendidikan Matematika')
                            <p id="camat">Koorprodi Pend. Matematika<br/>
                                FMIPA UNJ,
                            </p>
                            @else
                            <p id="camat">Koordinator Prodi {{ $prodikaprodi->prodi_kaprodi }}<br />
                                FMIPA UNJ,
                            </p>
                            @endif
                            

                            <div id="nama-camat">
                                @if ($cekdata->status == 'Selesai')
                                <img src="{{ $image }}" alt="Tanda Tangan" width="150px"
                                height="100px"><br />
                                @else
                                   <br>
                                   <br>
                                   <br>
                                @endif
                                <u>{{ $prodikaprodi->nama_kaprodi }}</u><br />
                                NIP.{{ $prodikaprodi->nip_kaprodi }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif



        <!--LEBIH DARI 3 MAHASISWA-->
        @if (is_array($array_namamhs) && count($array_namamhs) >= 4 && is_array($array_nimmhs) && count($array_nimmhs) >= 4)

            <div class="sheet">
                <div class="kopsurat">
                    <table>
                        <tr>
                            <td>
                                <img src="{{ public_path('storage/image/logounj.png') }}" alt=""
                                    width="150px" height="160px">
                            </td>
                            <td class="tengah">
                                <h2 class="kementrian">KEMENTERIAN PENDIDIKAN, KEBUDAYAAN,</h2>
                                <h2 class="kementrian">RISET DAN TEKNOLOGI</h2>
                                <h3 class="kementrian">UNIVERSITAS NEGERI JAKARTA</h3>
                                <h3 class="univ">FAKULTAS MATEMATIKA DAN ILMU PENGETAHUAN ALAM</h3>
                                <h3 class="univ">PROGRAM STUDI {{ $cekdata->prodi_mahasiswa }}</h3>
                                <b class="kampus">Kampus A, Gedung Hasjim Asjarie Rawamangun, Jakarta Timur 13220
                                </b><br>
                                <b class="kampus">
                                    Telepon (021) 4894909, E-mail : <a href="">dekanfmipa@unj.ac.id </a>,
                                        <a href="">www.fmipa.unj.ac.id</a>
                                </b>
                                <br>
                            </td>
                        </tr>
                    </table>
                </div>

                <div class="content">
                    <div id="alamat" class="row">
                        <div id="lampiran" class="col-md-6">
                            <br>
                            <p id="tls">Jakarta, {{ $cekdata->created_at->locale('id')->isoFormat('LL') }}</p>
                            Nomor : @if ($cekdata->prodi_mahasiswa == 'Ilmu Komputer')
                                {{ $cekdata->nomor_urut }}/ILKOM/{{ $cekdata->nomor_surat }} <br />
                            @elseif ($cekdata->prodi_mahasiswa == 'Pendidikan Matematika')
                                {{ $cekdata->nomor_urut }}/PENMAT/{{ $cekdata->nomor_surat }}
                            @elseif ($cekdata->prodi_mahasiswa == 'Matematika')
                                {{ $cekdata->nomor_urut }}/MAT/{{ $cekdata->nomor_surat }}
                            @else
                                {{ $cekdata->nomor_urut }}/STAT/{{ $cekdata->nomor_surat }}
                            @endif
                            Lampiran : 1 <br />
                            Perihal : Permohonan Surat Pengantar KKL
                            <br>
                            <br>
                        </div>
                        <div id="tgl-srt">

                            <p class="alamat-tujuan">Kepada<br />
                                {{ $jabatanpimpinan->jabatan_pimpinan }}<br />
                                {{ $jabatanpimpinan->nama_pimpinan }}<br />
                                Di tempat
                            </p>

                        </div>
                    </div>
                    <div id="pembuka" class="row">Kami mengajukan permohonan untuk mendapatkan surat pengantar Kuliah Kerja Lapangan (KKL) bagi mahasiswa Program Studi {{$cekdata->prodi_mahasiswa}} dengan daftar nama terlampir.</div>
                    <div id="tempat-tgl">
                        <br>

                        <table>
                            <tr>
                                <td>Tempat</td>
                                <td> :</td>
                                <td> {{ $cekdata->formulir1 }}</td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td> :</td>
                                <td> {{ $cekdata->formulir2 }}</td>
                            </tr>
                            <tr>
                                <td>Waktu Pelaksanaan</td>
                                <td> :</td>
                                <td> {{ $cekdata->formulir3 }}</td>
                            </tr>
                        </table>
                    </div>
                    <br>

                    <div id="penutup">Demikian permohonan ini kami sampaikan. Atas bantuan dan kerja samanya, kami
                        ucapkan
                        terima
                        kasih.</div>
                    <br>
                    <br>
                    <div id="ttd" class="row">
                        <div class="col-md-4">
                            @if ($prodikaprodi->prodi_kaprodi == 'Pendidikan Matematika')
                            <p id="camat">Koorprodi Pend. Matematika<br/>
                                FMIPA UNJ,
                            </p>
                            @else
                            <p id="camat">Koordinator Prodi {{ $prodikaprodi->prodi_kaprodi }}<br />
                                FMIPA UNJ,
                            </p>
                            @endif
                            

                            <div id="nama-camat">
                                @if ($cekdata->status == 'Selesai')
                                <img src="{{ $image }}" alt="Tanda Tangan" width="150px"
                                height="100px"><br />
                                @else
                                   <br>
                                   <br>
                                   <br>
                                @endif
                                <u>{{ $prodikaprodi->nama_kaprodi }}</u><br />
                                NIP.{{ $prodikaprodi->nip_kaprodi }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="pagebreak">
            </div>

            <div class="sheet">
                <div class="kopsurat">
                    <table>
                        <tr>
                            <td>
                                <img src="https://cdn.kibrispdr.org/data/861/unj-logo-png-4.png" alt=""
                                    width="150px" height="160px">
                            </td>
                            <td class="tengah">
                                <h2 class="kementrian">KEMENTERIAN PENDIDIKAN, KEBUDAYAAN,</h2>
                                <h2 class="kementrian">RISET DAN TEKNOLOGI</h2>
                                <h3 class="kementrian">UNIVERSITAS NEGERI JAKARTA</h3>
                                <h3 class="univ">FAKULTAS MATEMATIKA DAN ILMU PENGETAHUAN ALAM</h3>
                                <h3 class="univ">PROGRAM STUDI {{ $prodikaprodi->prodikaprodi }}</h3>
                                <b class="kampus">Kampus A, Gedung Hasjim Asjarie Rawamangun, Jakarta Timur 13220
                                </b>
                                <b class="kampus">
                                    Telepon (021) 4894909, E-mail : dekanfmipa@unj.ac.id, www.fmipa.unj.ac.id
                                </b>
                                <br>
                            </td>
                        </tr>
                    </table>
                </div>

                <div class="content">
                    <br>
                    <div id="penutup"><i>Lampiran</i></div>
                    <div id="penutup"><strong><p class="text-center">Daftar Mahasiswa yang Mengikuti KKL</p></strong></div>
                    <table style="margin-top:25px;page-break-inside: auto" class="kartu">
                        <thead>
                            <tr>
                                <th style="width: 0.8cm">No. </th>
                                <th style="width: 5cm">Nama Mahasiswa </th>
                                <th>No. Reg </th>
                            </tr>
                        </thead>
                        <tbody>
                            @for ($i = 0; $i < count($array_namamhs); $i++)
                                <tr>
                                    <td>{{ $i + 1 }}</td>
                                    <td>{{ $array_namamhs[$i] }}</td>
                                    <td>{{ $array_nimmhs[$i] }}</td>
                                </tr>
                            @endfor
                        </tbody>
                    </table>
                </div>
            </div>
        @endif
    @endif



</body>

</html>

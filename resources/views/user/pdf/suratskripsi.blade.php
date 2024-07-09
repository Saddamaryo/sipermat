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

        .surattugas {
            text-align: center;
            font-size: 16pt;
            line-height: 1.15
        }

        .notugas {
            text-align: center;
            font-size: 14pt;
            line-height: 1.15
        }

        #tls {
            text-align: right;
            font-size: 12pt;
        }

        .alamat-tujuan {
            text-align: left;
            font-size: 12pt;
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
            text-align: justify;
            line-height: 1.5;
            font-size: 12pt;
        }

        #pembuka {
            text-align: justify;
            line-clamp: 1.5;
            font-size: 12pt;

        }
        #penutup {
            text-align: justify;
            line-height: 1.5;
            font-size: 12pt;
        }

        #camat {
            text-align: left;
            font-size: 12pt;
            margin-left: 200px
        }

        #nama-camat {
            text-align: left;
            font-size: 12pt;
            margin-left: 200px
        }

        #ttd {
            text-align: left;
            font-size: 12pt;
            margin-left: 200px
        }
    </style>
</head>


<!--SCRIPT FUNCTION MENAMPILKAN DATA TTD-->
@php
    $imagePath = public_path('storage/file_ttd/' . $prodikaprodi->file_ttd);
    $imageData = base64_encode(file_get_contents($imagePath));
    $image = 'data:image/' . mime_content_type($imagePath) . ';base64,' . $imageData;
@endphp

<body>

    <!--MAKSIMAL 3 MAHASISWA-->
    <div class="sheet">
        <div class="kopsurat">
            <table>
                <tr>
                    <td>
                        <img src="{{ public_path('storage/image/logounj.png') }}" alt=""
                            width="130px" height="160px">
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
            <br>
            <div id="tempat-tgl">
                <h3 class="surattugas"><u>SURAT TUGAS</u>
                </h3>
                @if ($cekdata->prodi_mahasiswa == 'Ilmu Komputer')
                <h3 class="notugas">No. {{$cekdata->nomor_urut}}/ILKOM/{{$cekdata->nomor_surat}}</h3>
                @elseif ($cekdata->prodi_mahasiswa == 'Pendidikan Matematika')
                <h3 class="notugas">No. {{$cekdata->nomor_urut}}/PENMAT/{{$cekdata->nomor_surat}}</h3>
                @elseif ($cekdata->prodi_mahasiswa == 'Matematika')
                <h3 class="notugas">No. {{$cekdata->nomor_urut}}/MAT/{{$cekdata->nomor_surat}}</h3>
                @elseif ($cekdata->prodi_mahasiswa == 'Statistika')
                <h3 class="notugas">No. {{$cekdata->nomor_urut}}/STAT/{{$cekdata->nomor_surat}}</h3>
                @endif
                <br>

                <table id="penutup">
                    <tr>
                        <td>Kepada Yth</td>
                        <td>. </td>
                        <td> {{ $cekdata->formulir1 }}</td>
                    </tr>
                    <tr>
                        <td>Dari</td>
                        <td> :</td>
                        <td> Koordinator Program Studi {{ $cekdata->prodi_mahasiswa }}</td>
                    </tr>
                    <tr>
                        <td>Perihal</td>
                        <td> :</td>
                        <td> Pembimbing Skripsi</td>
                    </tr>
                </table>
            </div>
            <br>
            <div id="penutup">Dengan ini saya menugaskan Bapak/Ibu sebagai Dosen Pembimbing I untuk mahasiswa di
                bawah ini dalam rangka penyusunan skripsi semester {{ $cekdata->formulir3 }}:</div>
            <br>
            <div id="tempat-tgl">

                <table>
                    <tr>
                        <td>Nama</td>
                        <td> :</td>
                        <td> {{ $cekdata->nama_mahasiswa }}</td>
                    </tr>
                    <tr>
                        <td>No. Reg</td>
                        <td> :</td>
                        <td>{{ $cekdata->nim_mahasiswa }}</td>
                    </tr>
                    <tr>
                        <td>Nomor HP</td>
                        <td> :</td>
                        <td> {{ $cekdata->nomor_user }}</td>
                    </tr>
                    <tr>
                        <td>Nomor Telp. Rumah</td>
                        <td> :</td>
                        <td> -</td>
                    </tr>
                    <tr>
                        <td>Masa berlaku s/d semester</td>
                        <td> :</td>
                        <td> {{ $cekdata->formulir3 + 1 }}</td>
                    </tr>
                </table>
            </div>
            <br>
            <br>
            <div id="pembuka"><u><strong>Materi:</strong> </u></div>
            <div id="penutup"><i>{{$cekdata->formulir4}}</i></div>
            <br>
            <div id="penutup">Demikian surat tugas ini dibuat untuk dapat dilaksanakan sebagaimana mestinya.</div>
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

    <div class="pagebreak"></div>
    <div class="sheet">
        <div class="kopsurat">
            <table>
                <tr>
                    <td>
                        <img src="https://cdn.kibrispdr.org/data/861/unj-logo-png-4.png" alt="" width="150px"
                            height="160px">
                    </td>
                    <td class="tengah">
                        <h2 class="kementrian">KEMENTERIAN PENDIDIKAN, KEBUDAYAAN,</h2>
                        <h2 class="kementrian">RISET DAN TEKNOLOGI</h2>
                        <h3 class="kementrian">UNIVERSITAS NEGERI JAKARTA</h3>
                        <h3 class="univ">FAKULTAS MATEMATIKA DAN ILMU PENGETAHUAN ALAM</h3>
                        <h3 class="univ">PROGRAM STUDI {{ $prodikaprodi->prodi_kaprodi }}</h3>
                        <b class="kampus">Kampus A, Gedung Hasjim Asjarie Rawamangun, Jakarta Timur 13220
                        </b>
                        <br>
                        <b class="kampus">
                            Telepon (021) 4894909, E-mail : <a href="">dekanfmipa@unj.ac.id,
                                www.fmipa.unj.ac.id</a>
                        </b>
                        <br>
                    </td>
                </tr>
            </table>
        </div>

        <div class="content">
            <br>

            <div id="tempat-tgl">
                <h3 class="surattugas"><u>SURAT TUGAS</u>
                </h3>
                @if ($cekdata->prodi_mahasiswa == 'Ilmu Komputer')
                <h3 class="notugas">No. {{$cekdata->nomor_urut}}/ILKOM/{{$cekdata->nomor_surat}}</h3>
                @elseif ($cekdata->prodi_mahasiswa == 'Pendidikan Matematika')
                <h3 class="notugas">No. {{$cekdata->nomor_urut}}/PENMAT/{{$cekdata->nomor_surat}}</h3>
                @elseif ($cekdata->prodi_mahasiswa == 'Matematika')
                <h3 class="notugas">No. {{$cekdata->nomor_urut}}/MAT/{{$cekdata->nomor_surat}}</h3>
                @elseif ($cekdata->prodi_mahasiswa == 'Statistika')
                <h3 class="notugas">No. {{$cekdata->nomor_urut}}/STAT/{{$cekdata->nomor_surat}}</h3>
                @endif
                
                <br>

                <table id="penutup">
                    <tr>
                        <td>Kepada Yth</td>
                        <td>. </td>
                        <td> {{ $cekdata->formulir2 }}</td>
                    </tr>
                    <tr>
                        <td>Dari</td>
                        <td> :</td>
                        <td> Koordinator Program Studi {{ $cekdata->prodi_mahasiswa }}</td>
                    </tr>
                    <tr>
                        <td>Perihal</td>
                        <td> :</td>
                        <td> Pembimbing Skripsi </td>
                    </tr>
                </table>
            </div>
            <br>
            <div id="penutup">Dengan ini saya menugaskan Bapak/Ibu sebagai Dosen Pembimbing II untuk mahasiswa di
                bawah ini dalam rangka penyusunan skripsi semester {{ $cekdata->formulir3 }}:</div>
            <br>
            <div id="tempat-tgl">
                <table>
                    <tr>
                        <td>Nama</td>
                        <td> :</td>
                        <td> {{ $cekdata->nama_mahasiswa }}</td>
                    </tr>
                    <tr>
                        <td>No. Reg</td>
                        <td> :</td>
                        <td>{{ $cekdata->nim_mahasiswa }}</td>
                    </tr>
                    <tr>
                        <td>Nomor HP</td>
                        <td> :</td>
                        <td> {{ $cekdata->nomor_user }}</td>
                    </tr>
                    <tr>
                        <td>Nomor Telp. Rumah</td>
                        <td> :</td>
                        <td> -</td>
                    </tr>
                    <tr>
                        <td>Masa berlaku s/d semester</td>
                        <td> :</td>
                        <td> {{ $cekdata->formulir3 + 1 }}</td>
                    </tr>
                </table>
            </div>
            <br>
            <br>
            <div id="pembuka"><u><strong>Materi:</strong></u></div>
            <div id="penutup"><i>{{$cekdata->formulir4}}</i></div>
            <br>
            <div id="penutup">Demikian surat tugas ini dibuat untuk dapat dilaksanakan sebagaimana mestinya.</div>
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
</body>

</html>

<!-- MODAL PENGAJUAN SURAT BIASA MAHASISWA-->
<div class="modal fade" id="modal_pengajuansurat" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title" id="exampleModalLabel">Pengajuan {{$data->nama_surat}}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="modal-body">
                    <form action="{{url("ajukan")}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" value="{{$data->id}}" name="id_surat" id="id_surat">
                        <input type="hidden" value="{{$data->slug}}" name="slug" id="slug">
                        <input type="hidden" value="{{$data->nama_surat}}" name="nama_surat" id="nama_surat">
                        <input type="hidden" name="nomor_surat" value="{{$data->nomor}}" id="nomor_surat">
                        <input type="hidden" name="id_user" value="{{Auth::guard('users')->user()->id}}">
                        <div class="mb-3">
                            <label for="" class="col-form-label"><h6>Nama Lengkap</h6></label>
                            @if ($data->slug == 's-pen' || $data->slug == 's-pol' || $data->slug == 's-pd' || $data->slug == 's-skrip')
                            <div class="form-text" id="basic-addon5">Surat ini tidak bisa diajukan lebih dari 1 mahasiswa.</div>
                            @else
                            <div class="form-text" id="basic-addon5">Jika pengajuan lebih dari 1 mahasiswa, harap tulis nama mahasiswa selanjutnya dengan (;) di depannya. Contoh = Nama 1; Nama 2; dst.</div>
                                
                            @endif
                            <input type="text" class="form-control" id="nama_mahasiswa" required value="{{ Auth::guard('users')->user()->nama_mahasiswa }}" name="nama_mahasiswa">
                        </div>
                        <div class="mb-3">
                            <label for="" class="col-form-label"><h6>Program Studi</h6></label>
                            <div class="form-text" id="basic-addon5">Tidak bisa diubah</div>
                            <input type="text" class="form-control" id="prodi_mahasiswa" value="{{ Auth::guard('users')->user()->prodi_mahasiswa }}" name="prodi_mahasiswa" required readonly>
                        </div>
                        <div class="mb-3">
                            <label for="" class="col-form-label"><h6>Nomor Induk Mahasiswa(NIM)</h6></label>
                            @if ($data->slug == 's-pen' || $data->slug == 's-pol' || $data->slug == 's-pd' || $data->slug =='s-skrip')
                            <div class="form-text" id="basic-addon5">Surat ini tidak bisa diajukan lebih dari 1 mahasiswa.</div>
                            @else
                            <div class="form-text" id="basic-addon5">Jika pengajuan lebih dari 1 mahasiswa, harap tulis NIM mahasiswa selanjutnya dengan (;) di depannya. Contoh = NIM 1; NIM 2; dst.</div>
                            @endif
                            <input type="text" class="form-control" id="nim_mahasiswa" required value="{{ Auth::guard('users')->user()->nim_mahasiswa }}" name="nim_mahasiswa">
                        </div>
                        <div class="mb-3">
                            <label for="" class="col-form-label"><h6>Nomor Handphone Mahasiswa</h6></label>
                            <input type="text" class="form-control" id="nomo_user" required name="nomor_user">
                        </div>
                        
                        @if ($data->slug == 's-pd')
                        <div class="mb-3">
                            <label for="r" class="col-form-label"><h6>Instansi/Tempat Tujuan</h6></label>
                            <input type="text" class="form-control" id="formulir1" required name="formulir1">
                        </div>
                        <div class="mb-3">
                            <label for="r" class="col-form-label"><h6>Alamat Instansi/Tempat Tujuan</h6></label>
                            <input type="text" class="form-control" id="formulir2" required name="formulir2">
                        </div>
                        <div class="mb-3">
                            <label for="r" class="col-form-label"><h6>Waktu Pelaksanaan</h6></label>
                            <input type="text" class="form-control" id="formulir3" required name="formulir3">
                        </div>

                        <div class="mb-3">
                            <label for="r" class="col-form-label"><h6>Data yang Diperlukan</h6></label>
                            <div class="form-text" id="basic-addon5">Jika data yang diperlukan lebih dari 1 data, harap tulis keperluan data selanjutnya dengan (;) di depannya. Contoh = Data 1; Data 2; dst.</div>
                            <textarea class="form-control" id="formulir4" required name="formulir4"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="r" class="col-form-label"><h6>Alasan Pengajuan Surat Permohonan Permintaan Data</h6></label>
                            <input type="text" class="form-control" id="formulir5" required name="formulir5">
                        </div>




                        @elseif($data->slug == 's-trans')
                        <div class="mb-3">
                            <label for="r" class="col-form-label"><h6>E-Mail Mahasiswa</h6></label>
                            <input type="text" class="form-control" id="formulir1" required name="formulir1">
                        </div>
                        <div class="mb-3">
                            <label for="r" class="col-form-label"><h6>Angkatan</h6></label>
                            <input type="text" class="form-control" id="formulir2" required name="formulir2">
                        </div>
                        <div class="mb-3">
                            <label for="r" class="col-form-label"><h6>Alasan Pengajuan Surat Transkrip Nilai</h6></label>
                            <input type="text" class="form-control" id="formulir3" required name="formulir3">
                        </div>

                        @elseif($data->slug == 's-pkl')
                        <div class="mb-3">
                            <label for="r" class="col-form-label"><h6>Tempat Pelaksanaan Praktik Kerja Lapangan (PKL)</h6></label>
                            <input type="text" class="form-control" id="formulir1" required name="formulir1">
                        </div>
                        <div class="mb-3">
                            <label for="r" class="col-form-label"><h6>Alamat Tempat Pelaksanaan Praktik Kerja Lapangan (PKL)</h6></label>

                            <input type="text" class="form-control" id="formulir2" required name="formulir2">
                        </div>
                        <div class="mb-3">
                            <label for="r" class="col-form-label"><h6>Periode Pelaksanaan Praktik Kerja Lapangan (PKL)</h6></label>
                            <div class="form-text" id="basic-addon5">Contoh input = 17 Agustus 1945 - 19 November 2024</div>
                            <input type="text" class="form-control" id="formulir3" required name="formulir3">
                        </div>

                        @elseif($data->slug == 's-pol')
                        <div class="mb-3">
                            <label for="r" class="col-form-label"><h6>Waktu Pelaksanaan Observasi</h6></label>
                            <div class="form-text" id="basic-addon5">Contoh input = 17 Agustus 1945 - 19 November 2024</div>
                            <input type="text" class="form-control" id="formulir1" required name="formulir1">
                        </div>
                        <div class="mb-3">
                            <label for="r" class="col-form-label"><h6>Tempat Pelaksanaan Observasi</h6></label>
                            <input type="text" class="form-control" id="formulir2" required name="formulir2">
                        </div>
                        <div class="mb-3">
                            <label for="r" class="col-form-label"><h6>Alamat Tempat Pelaksanaan Observasi</h6></label>
                            <textarea class="form-control" id="message-text" id="formulir3" required name="formulir3"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="r" class="col-form-label"><h6>Alasan Keperluan Observasi</h6></label>
                            <input type="text" class="form-control" id="formulir4" required name="formulir4">
                        </div>


                        @elseif($data->slug == 's-kkl')
                        <div class="mb-3">
                            <label for="r" class="col-form-label"><h6>Tempat Pelaksanaan Kuliah Kerja Lapangan (KKL)</h6></label>
                            <input type="text" class="form-control" id="formulir1" required name="formulir1">
                        </div>
                        <div class="mb-3">
                            <label for="r" class="col-form-label"><h6>Alamat Tempat Pelaksanaan Kuliah Kerja Lapangan (KKL)</h6></label>
                            <textarea class="form-control" id="message-text" id="formulir2" required name="formulir2"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="r" class="col-form-label"><h6>Periode Pelaksanaan Kuliah Kerja Lapangan (KKL)</h6></label>
                            <div class="form-text" id="basic-addon5">Contoh input = 17 Agustus 1945 - 19 November 2024</div>
                            <input type="text" class="form-control" id="formulir3" required name="formulir3">
                        </div>
                        <div class="mb-3">
                            <label for="r" class="col-form-label"><h6>Daftar Nama Mahasiswa yang Mengikuti KKL</h6></label>
                            <div class="form-text" id="basic-addon5">Ketentuan tipe file = docx, doc, pdf. Maksimum 2 Mb</div>
                            <input type="file" class="form-control" id="file_ajuan" required name="file_ajuan">
                        </div>


                        @elseif($data->slug == 's-pkm')
                        <div class="mb-3">
                            <label for="r" class="col-form-label"><h6>Tempat Pelaksanaan Praktik Kegiatan Mengajar (PKM)</h6></label>
                            <input type="text" class="form-control" id="formulir1" required name="formulir1">
                        </div>
                        <div class="mb-3">
                            <label for="r" class="col-form-label"><h6>Alamat Tempat Pelaksanaan Praktik Kegiatan Mengajar (PKM)</h6></label>
                            <textarea class="form-control" id="message-text" id="formulir2" required name="formulir2"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="r" class="col-form-label"><h6>Semester</h6></label>
                            <div class="form-text" id="basic-addon5">Masukkan semester dari Universitas Negeri Jakarta yang sedang dijalani, contoh = 121.</div>
                            <input type="number" class="form-control" id="formulir3" required name="formulir3">
                        </div>
                        <div class="mb-3">
                            <label for="r" class="col-form-label"><h6>Periode Tahun Akademik</h6></label>
                            <div class="form-text" id="basic-addon5">Masukkan periode akademik dari Universitas Negeri Jakarta yang sedang dijalani, contoh = 2023/2024.</div>
                            <input type="text" class="form-control" id="formulir4" required name="formulir4">
                        </div>



                        @elseif($data->slug == 's-pen')
                        <div class="mb-3">
                            <label for="r" class="col-form-label"><h6>Waktu Pelaksanaan Penelitian</h6></label>
                            <input type="text" class="form-control" id="formulir1" required name="formulir1">
                        </div>
                        <div class="mb-3">
                            <label for="r" class="col-form-label"><h6>Tempat Pelaksanaan Penelitian</h6></label>
                            <input type="text" class="form-control" id="formulir2" required name="formulir2">
                        </div>
                        <div class="mb-3">
                            <label for="r" class="col-form-label"><h6>Alamat Tempat Pelaksanaan Penelitian</h6></label>
                            <textarea class="form-control" id="message-text" id="formulir3" required name="formulir3"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="r" class="col-form-label"><h6>Alasan Keperluan Penelitian</h6></label>
                            <input type="text" class="form-control" id="formulir4" required name="formulir4">
                        </div>



                        @elseif($data->slug == 's-rekom')
                        <div class="mb-3">
                            <label for="r" class="col-form-label"><h6>Alasan Pengajuan Rekomendasi</h6></label>
                            <input type="text" class="form-control" id="formulir1" required name="formulir1">
                        </div>
                        <div class="mb-3">
                            <label for="r" class="col-form-label"><h6>Keterangan Rekomendasi</h6></label>
                            <input type="text" class="form-control" id="formulir2" required name="formulir2">
                        </div>

                        

                        @elseif($data->slug == 's-km')
                        <div class="mb-3">
                            <label for="r" class="col-form-label"><h6>Alasan Keperluan Pengajuan Surat Keterangan Mahasiswa</h6></label>
                            <input type="text" class="form-control" id="formulir1" required name="formulir1">
                        </div>



                        @elseif($data->slug == 's-pratrans')
                        <div class="mb-3">
                            <label for="r" class="col-form-label"><h6>E-Mail Mahasiswa</h6></label>
                            <input type="text" class="form-control" id="formulir1" required name="formulir1">
                        </div>
                        <div class="mb-3">
                            <label for="r" class="col-form-label"><h6>Angkatan</h6></label>
                            <input type="text" class="form-control" id="formulir2" required name="formulir2">
                        </div>
                        <div class="mb-3">
                            <label for="r" class="col-form-label"><h6>Alasan Pengajuan Surat Transkrip Nilai</h6></label>
                            <input type="text" class="form-control" id="formulir3" required name="formulir3">
                        </div>
                        

                        @elseif($data->slug == 's-lain')
                        <div class="mb-3">
                            <label for="r" class="col-form-label"><h6>E-Mail Mahasiswa</h6></label>
                            <input type="text" class="form-control" id="formulir1" required name="formulir1">
                        </div>
                        <div class="mb-3">
                            <label for="r" class="col-form-label"><h6>Surat yang Ingin Diajukan</h6></label>
                            <input type="text" class="form-control" id="formulir2" required name="formulir2">
                        </div>
                        <div class="mb-3">
                            <label for="r" class="col-form-label"><h6>Kebutuhan Pengajuan Surat</h6></label>
                            <input type="text" class="form-control" id="formulir3" required name="formulir3">
                        </div>
                        @endif
                      
                        @if ($data->slug != 's-kkl')
                        <div class="mb-3">
                            <label for="" class="col-form-label"><h6>File Pendukung (Jika ada)</h6></label>
                            <div class="form-text" id="basic-addon5">File hanya diterima dalam bentuk docx, doc, pdf, dan excel. Maksimum 2 Mb</div>
                            <input type="file" class="form-control" id="file_ajuan" name="file_ajuan">
                        </div>
                        @else
                            
                        @endif
                        
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-outline-primary">Submit</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>


<!--MODAL PENGAJUAN SURAT TUGAS MAHASISWA-->
<div class="modal fade" id="modal_pengajuansurattugas" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title" id="exampleModalLabel">Pengajuan {{$data->nama_surat}}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="modal-body">
                    <form action="{{url("ajukansurattugas")}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" value="{{$data->id}}" name="id_surat" id="id_surat">
                        <input type="hidden" value="{{$data->slug}}" name="slug" id="slug">
                        <input type="hidden" value="{{$data->nama_surat}}" name="nama_surat" id="nama_surat">
                        <input type="hidden" name="nomor_surat" value="{{$data->nomor}}" id="nomor_surat">
                        <input type="hidden" name="id_user" value="{{Auth::guard('users')->user()->id}}">
                        <div class="mb-3">
                            <label for="" class="col-form-label"><h6>Nama Lengkap</h6></label>
                            <input type="text" class="form-control" id="nama_mahasiswa" required value="{{ Auth::guard('users')->user()->nama_mahasiswa }}" name="nama_mahasiswa">
                        </div>
                        <div class="mb-3">
                            <label for="" class="col-form-label"><h6>Program Studi</h6></label>
                            <div class="form-text" id="basic-addon5">Tidak bisa diubah</div>
                            <input type="text" class="form-control" id="prodi_mahasiswa" value="{{ Auth::guard('users')->user()->prodi_mahasiswa }}" name="prodi_mahasiswa" required readonly>
                        </div>
                        <div class="mb-3">
                            <label for="" class="col-form-label"><h6>Nomor Induk Mahasiswa(NIM)</h6></label>
                            <input type="text" class="form-control" id="nim_mahasiswa" required value="{{ Auth::guard('users')->user()->nim_mahasiswa }}" name="nim_mahasiswa">
                        </div>
                        <div class="mb-3">
                            <label for="" class="col-form-label"><h6>Nomor Handphone Mahasiswa</h6></label>
                            <input type="text" class="form-control" id="nomo_user" required name="nomor_user">
                        </div>

                        @if($data->slug == 's-skrip')
                        <div class="mb-3">
                            <label for="r" class="col-form-label"><h6>Dosen Pembimbing Skripsi 1</h6></label>
                            <div class="form-text" id="basic-addon5">Masukkan nama dosen beserta dengan gelarnya, contoh = Dr. Ria Arafiyah, M.Si.</div>
                            <input type="text" class="form-control" id="formulir1" required name="formulir1">
                        </div>
                        <div class="mb-3">
                            <label for="r" class="col-form-label"><h6>Dosen Pembimbing Skripsi 2</h6></label>
                            <div class="form-text" id="basic-addon5">Masukkan nama dosen beserta dengan gelarnya, contoh = Dr. Ria Arafiyah, M.Si.</div>
                            <input type="text" class="form-control" id="formulir2" required name="formulir2">
                        </div>
                        <div class="mb-3">
                            <label for="r" class="col-form-label"><h6>Semester Sekarang</h6></label>
                            <div class="form-text" id="basic-addon5">Masukkan semester dari Universitas Negeri Jakarta yang sedang dijalani, contoh = 121.</div>
                            <input type="number" class="form-control" id="message-text" id="formulir3" required name="formulir3">
                        </div>
                        <div class="mb-3">
                            <label for="r" class="col-form-label"><h6>Judul atau Topik Skripsi</h6></label>
                            <textarea class="form-control" id="formulir4" required name="formulir4"></textarea>
                        </div>


                        @elseif($data->slug == 's-laintugas')
                            <div class="mb-3">
                                <label for="r" class="col-form-label"><h6>E-Mail Mahasiswa</h6></label>
                                <input type="text" class="form-control" id="formulir1" required name="formulir1">
                            </div>
                            <div class="mb-3">
                                <label for="r" class="col-form-label"><h6>Surat Tugas yang Ingin Diajukan</h6></label>
                                <input type="text" class="form-control" id="formulir2" required name="formulir2">
                            </div>
                            <div class="mb-3">
                                <label for="r" class="col-form-label"><h6>Kebutuhan Pengajuan Surat Tugas</h6></label>
                                <input type="text" class="form-control" id="formulir3" required name="formulir3">
                            </div>
                        @endif
                      
                        <div class="mb-3">
                            <label for="" class="col-form-label"><h6>File Pendukung (Jika ada)</h6></label>
                            <div class="form-text" id="basic-addon5">File hanya diterima dalam bentuk docx, doc, pdf, dan excel. Maksimum 2 Mb</div>
                            <input type="file" class="form-control" id="file_ajuan" name="file_ajuan">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-outline-primary">Submit</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>

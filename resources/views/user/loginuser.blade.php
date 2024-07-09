<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
        <script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
        <link rel="stylesheet" type="text/css" href="/css/user_landing.css">
        <title>Sipermat | Login Mahasiswa</title>
        <link rel="icon" href="{{ asset('storage/image/logounj.png') }}" >
    </head>
<body>
    
<main>
    <header>
        <nav class="main-nav">
            <div class="brand text-main">
                <a href="/loginuser">
                    <h1><img src="{{ asset('storage/image/logounj.png') }}"
                            alt="" width="30px" height="35px"> SIPERMAT</h1>
                </a>
            </div>
        </nav>
    </header><!-- /header -->
    <div class="header">
        <div class="container">
            <input type="checkbox" id="flip">
            <div class="cover">
                <div class="front">
                    <img class="backimg"
                        src="{{ asset('storage/image/sipermatlogin1.png') }}" alt="">
                </div>
                <div class="back">
                    <img class="depan"
                        src="{{ asset('storage/image/sipermatlogin1.png') }}"
                        alt="">
                </div>
            </div>
            <div class="forms">
                <div class="kontenform">
                    <!--lOGIN-->
                    <div class="loginform">
                        <div class="judul">SIPERMAT</div>
                    </div>

                    <div class="text register-text1">Sistem Informasi Pengajuan dan Pengarsipan Surat Mahasiswa di Rumpun Matematika (SIPERMAT) merupakan sistem informasi untuk mengakomodasi keperluan akademik mahasiswa, terlebih dalam proses surat menyurat. Sistem ini dirancang untuk mempermudah dan mempercepat proses pengajuan, persetujuan, dan pengarsipan berbagai jenis surat yang dibutuhkan oleh mahasiswa, seperti surat permohonan penelitian, surat tugas, surat keterangan mahasiswa, dan lain sebagainya. Sudah mempunyai akun? silahkan <label for="flip"><strong> Login</strong> </label>
                    </div>


                    <!-- REGISTER -->
                    <div class="registerform">
                        <div class="judul">LOGIN SIPERMAT</div>
                        <form action="{{ route('user_login_submit') }}" method="POST">
                            @csrf
                            <div class="inputan">
                                <div class="kotakinput">
                                    <i class="fas fa-user"></i>
                                    <input type="text" placeholder="NIM (Nomor Induk Mahasiswa)" value="{{old('nim_mahasiswa')}}" name="nim_mahasiswa" required>
                                </div>
                                <div class="kotakinput">
                                    <i class="fas fa-lock"></i>
                                    <input type="password" placeholder="Password" name="password" required>
                                </div>
                                <div class="tombol kotakinput">
                                    <input type="submit" value="Login" name="submit">
                                </div>
                                <div class="text register-text">Jika tidak mempunyai akun, segera hubungi admin
                                    program studi masing-masing <label for="flip"> <strong> Kembali</strong></label></div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>

        </div>
    </div>

</main>


<footer>
    <div class="container-footer">
        <div class="footer-content row mb-4">
            <div class="footer-brand col-12 col-sm-12 col-md-3 col-lg-3">
                <div>
                    <h1 class="text-main">SIPERMAT</h1>
                </div>
            </div>

            <div class="footer-items-box col-12 col-sm-12 col-md-9 col-lg-9">
                <div class="footer-items row">
                    <div class="footer-item col-12 col-sm-12 col-md-4">
                        <div>
                            <div class="footer-item-content">
                                <h3 class="text-main">About SIPERMAT</h3>
                                <p class="text-footer"> Sistem
                                    Informasi Pengajuan dan Pengarsipan Surat Mahasiswa di Rumpun Matematika
                                    (SIPERMAT) merupakan sistem informasi untuk mengakomodasi keperluan akademik
                                    mahasiswa, terlebih dalam proses surat menyurat.</p>
                            </div>
                        </div>
                    </div>

                    <div class="footer-item col-12 col-sm-12 col-md-4">
                        <div>
                            <div class="footer-item-content">
                                <h3 class="text-main">Rumpun Matematika</h3>
    
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="copyright-section border-top">
            <div class="row">
                <div class="col-12">
                    <div class="copyright-content text-center mt-4">
                        <p class="text-second">Rumpun Matematika Universitas Negeri Jakarta</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

 <!--SWEETALERT-->
 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
 <script>
     @if ($errors->any())
         Swal.fire({
             icon: 'error',
             title: 'Oops...',
             html: '{!! implode('<br>', $errors->all()) !!}'
         });
     @endif

     @if (Session::get('error'))
         Swal.fire({
             icon: 'error',
             title: 'Error',
             text: '{{ Session::get('error') }}'
         });
     @endif

     @if (Session::get('success'))
         Swal.fire({
             icon: 'success',
             title: 'Success',
             text: '{{ Session::get('success') }}'
         });
     @endif
 </script>

 <!-- =========== Scripts =========  -->
 <script type="text/javascript" src="js/datatables.js"></script>
 <script type="text/javascript" src="js/bootstrapintegration.js"></script>
 <script type="text/javascript" src="js/tablescript.js"></script>
 <script src="js/script.js"></script>

<!-- SCRIPT JAVA SCRIPT-->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
    integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB"
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
    integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13"
    crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
    integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
    crossorigin="anonymous"></script>
<script src="library/bootstrap/js/bootstrap.min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init();
</script>


</body>

</html>
</body>
</html>


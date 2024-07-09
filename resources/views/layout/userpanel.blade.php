<!doctype html>
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
    <link rel="stylesheet" type="text/css" href="/css/user_main.css">
    <link rel="stylesheet" type="text/css" href="/css/datatables.css">
    <title>Sipermat | Mahasiswa</title>
    <link rel="icon" href="{{ asset('storage/image/logounj.png') }}">
</head>

<body>
    <header>

        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="/katalogsurat">
                    <h1>
                        <img src="{{ asset('storage/image/logounj.png') }}" alt="" width="30px"
                            height="35px">
                        SIPERMAT
                    </h1>
                </a>
                <button class="navbar-toggler bg-white" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link no-page-refresh" href="/katalogsurat">Daftar Surat</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link no-page-refresh" href="/pengajuansurat">Pengajuan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link no-page-refresh" href="/panduanpengajuan">Panduan Penggunaan</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="riwayatMenu" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Riwayat
                            </a>
                            <ul class="dropdown-menu text-main" aria-labelledby="riwayatMenu">
                                <li><a class="dropdown-item no-page-refresh text-main" href="/riwayatpengajuan">Surat
                                        Mahasiswa</a></li>
                                <li><a class="dropdown-item no-page-refresh text-main"
                                        href="/riwayatpengajuantugas">Surat Tugas</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <div class="d-flex align-items-center user-icon">
                        <a class="nav-link" href="#" id="pengaturanMenu" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <img src="{{ asset('storage/icon/user_12636584.png') }}" alt="">
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="pengaturanMenu">
                            <li><a class="dropdown-item no-page-refresh" href="/profilmahasiswa">Profil Mahasiswa</a>
                            </li>
                            <li><a class="dropdown-item" href="{{ route('user_logout') }}" id="logout-link">Logout
                                    Mahasiswa</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>

    </header>


    @yield('kontenuser')


    <footer>
        <div class="container">
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
                                    <p class="text-footer text-justify"><a class="a no-page-refresh"
                                            href="/katalogsurat">Sipermat</a> Sistem
                                        Informasi Pengajuan dan Pengarsipan Surat Mahasiswa di Rumpun Matematika
                                        (SIPERMAT) merupakan sistem informasi untuk mengakomodasi keperluan akademik
                                        mahasiswa, terlebih dalam proses surat menyurat. </p>
                                </div>
                            </div>
                        </div>

                        <div class="footer-item col-12 col-sm-12 col-md-4">
                            <div>
                                <div class="footer-item-content">
                                    <h3 class="text-main">Panduan Penggunaan</h3>
                                    <p class="text-footer"><a class="a no-page-refresh"
                                            href="/panduanpengajuan">Panduan</a> penggunaan Sistem
                                        Informasi Pengajuan dan Pengarsipan Surat Mahasiswa Rumpun Matematika.</p>
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
        <div class="swal" data-swal="{{ session('success') }}"></div>
    </footer>

    <!--SWEETALERT-->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: '{{ session('success') }}',
                showConfirmButton: true,
            });
        </script>
    @endif

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if (session('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: '{{ session('error') }}',
            });
        </script>
    @endif

    @if ($errors->any())
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                html: `<ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>`
            });
        </script>
    @endif

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('logout-link').addEventListener('click', function(event) {
                event.preventDefault();
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, logout!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = this.href;
                    }
                });
            });
        });
    </script>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.no-page-refresh').forEach(function(link) {
                link.addEventListener('click', function(event) {
                    event.preventDefault();
                    const url = this.href;
                    window.location.href = url;
                });
            });
        });
    </script>


    <!-- =========== Scripts =========  -->
    <script type="text/javascript" src="js/datatables.js"></script>
    <script type="text/javascript" src="js/bootstrapintegration.js"></script>
    <script type="text/javascript" src="js/tablescript.js"></script>
    <script src="js/script.js"></script>

    <!-- SCRIPT JAVA SCRIPT-->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>


</body>

</html>

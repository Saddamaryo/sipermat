<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
    <!--<link rel="stylesheet" href="https://sdnjs.cloudlare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">-->
    <title>Sipermat | Kaprodi</title>
    <link rel="stylesheet" href="/css/admin_main.css">
    <link rel="icon" href="{{ asset('storage/image/logounj.png') }}">
</head>

<body>
    <div class="container-fluid">
        <div class="navigation">
            <ul>
                <li>
                    <a class="a no-page-refresh" href="/pengajuansuratkaprodi">
                        <img src="{{ asset('storage/image/logounj.png') }}" alt="" width="40px"
                            height="40px">
                        <span class="title">SIPERMAT KAPRODI</span>
                    </a>
                </li>

                <li>
                    <a class="a no-page-refresh" href="/dashboardkaprodi">
                        <span class="icon">
                            <ion-icon name="home-outline"></ion-icon>
                        </span>
                        <span class="title">Dashboard</span>
                    </a>
                </li>

                <li>
                    <a class="a no-page-refresh" href="/pengajuansuratkaprodi">
                        <span class="icon">
                            <ion-icon name="chatbubble-outline"></ion-icon>
                        </span>
                        <span class="title">Pengajuan Surat</span>
                    </a>
                </li>

                <li>
                    <a class="a no-page-refresh" href="/arsipsurat">
                        <span class="icon">
                            <ion-icon name="book-outline"></ion-icon>
                        </span>
                        <span class="title">Arsip Surat Mahasiswa</span>
                    </a>
                </li>

                <li>
                    <a class="a no-page-refresh" href="/arsipsurattugas">
                        <span class="icon">
                            <ion-icon name="book-outline"></ion-icon>
                        </span>
                        <span class="title">Arsip Surat Tugas</span>
                    </a>
                </li>


                <li>
                    <a href="logout" id="logout-link">
                        <span class="icon">
                            <ion-icon name="log-out-outline"></ion-icon>
                        </span>
                        <span class="title">Logout</span>

                    </a>
                </li>
            </ul>
        </div>

        <!-- ========================= Main ==================== -->
        <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>

                <div class="user">
                    <img src="assets/imgs/customer01.jpg" alt="">
                </div>
            </div>

            <!-- ================ MULAI SECTION ================= -->
            @yield('kontenkaprodi')
            <div class="swal" data-swal="{{ session('success') }}"></div>
        </div>
    </div>

    <!--SWEET ALERT-->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript">
        const swal = $('.swal').data('swal');

        if (swal) {
            Swal.fire({
                'title': 'Success',
                'text': swal,
                'icon': 'success'
            })
        }
    </script>

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

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.preview-link').forEach(function(link) {
                link.addEventListener('click', function(event) {
                    event.preventDefault();
                    const url = this.href;
                    window.open(url, '_blank');
                });
            });
        });
    </script>

    <!-- =========== Scripts =========  -->
    <script type="text/javascript" src="js/datatables.js"></script>
    <script type="text/javascript" src="js/bootstrapintegration.js"></script>
    <script type="text/javascript" src="js/tablescript.js"></script>
    <script src="js/script.js"></script>

    <!-- ====== ionicons ======= -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
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

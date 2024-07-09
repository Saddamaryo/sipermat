@extends('layout.adminpanel')

@section('kontenadmin')
    <!-- ======================= Cards ================== -->

    <div class="cardBoxs row justify-content-center">
        <div class="cardx">
            <div>
                <h2 class="namewelcome">Welcome, {{ Auth::guard('dataadmin')->user()->nama_admin }}</h2>
                <p class="namewelcome">Admin Prodi Rumpun Matematika Universitas Negeri Jakarta</p>
            </div>
        </div>
    </div>
    <div class="cardBox row justify-content-center">
        <div class="card">
            <div>
                <div class="numbers">{{ $suratmenyurat += $surattugas }}</div>
                <div class="cardName">Total Pengajuan Surat</div>
            </div>

            <div class="iconBx">
                <ion-icon name="book-outline"></ion-icon>
            </div>
        </div>

        <div class="card">
            <div>
                <div class="numbers">{{ $totalsurattugas }}</div>
                <div class="cardName">Total Arsip Surat Tugas</div>
            </div>

            <div class="iconBx">
                <ion-icon name="book-outline"></ion-icon>
            </div>
        </div>

        <div class="card">
            <div>
                <div class="numbers">{{ $totalsuratmahasiswa }}</div>
                <div class="cardName">Total Arsip Surat Menyurat</div>
            </div>

            <div class="iconBx">
                <ion-icon name="book-outline"></ion-icon>
            </div>
        </div>

        <div class="card">
            <div>
                <div class="numbers">{{ $suratmenyuratprocess += $surattugasprocess }}</div>
                <div class="cardName">Total Surat Menunggu Konfirmasi</div>
            </div>

            <div class="iconBx">
                <ion-icon name="settings-outline"></ion-icon>
            </div>
        </div>

        <div class="card">
            <div>
                <div class="numbers">{{ $totalmahasiswa }}</div>
                <div class="cardName">Total Mahasiswa</div>
            </div>

            <div class="iconBx">
                <ion-icon name="people-outline"></ion-icon>
            </div>
        </div>
    </div>
@endsection

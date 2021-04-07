@extends('layouts.panel')

@section('title', 'Info Aplikasi')

@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card shadow-sm mb-4">
            <div class="card-body">
                <ul class="list-group list-group-unbordered mt-0 mb-0">
                    <li class="list-group-item border-top-0">
                        <span class="d-block font-weight-bold">
                            <i class="fas fa-box"></i> Nama Aplikasi
                        </span>
                        Siwanda Kapur
                    </li>
                    <li class="list-group-item">
                        <span class="d-block font-weight-bold">
                            <i class="fas fa-folder"></i> Judul
                        </span>
                        Sistem Penjadwalan dan Agenda KPPN Purwodadi
                    </li>
                    <li class="list-group-item">
                        <span class="d-block font-weight-bold">
                            <i class="fas fa-info-circle"></i> Deskripsi
                        </span>
                        Siwanda Kapur adalah aplikasi
                        website
                        untuk menjadwalkan kegiatan dan agenda bersama Satuan Kerja di lingkungan kerja dan pelayanan
                        KPPN
                        Purwodadi.
                    </li>
                    <li class="list-group-item">
                        <span class="d-block font-weight-bold">
                            <i class="fas fa-key"></i> Keyword
                        </span>
                        Siwanda
                        Kapur, KPPN Purwodadi, Direktorat
                        Jenderal Perbendaharaan, Kementerian Keuangan, Sistem
                        Penjadwalan dan Agenda
                    </li>
                    <li class="list-group-item border-bottom-0">
                        <span class="d-block font-weight-bold">
                            <i class="fab fa-github"></i> Versi</span>
                        Lunatic 2
                        v1.0.0
                    </li>
                    <li class="list-group-item border-bottom-0">
                        <span class="d-block font-weight-bold">
                            <i class="fas fa-user"></i> Developer
                        </span>
                        Moh.
                        Walid Arkham Sani<br>Tim PKL 2021 Politeknik Keuangan Negara STAN
                    </li>
                </ul>
                <a href="https://wa.me/6285157626557" class="btn btn-primary mt-3">
                    <i class="fab fa-whatsapp"></i> Kontak
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
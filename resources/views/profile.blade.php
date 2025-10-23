@extends('layouts.app')

@section('judul', 'Profile')

@section('konten')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">Profile Pengguna</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <h5>Informasi Akun</h5>
                        <p><strong>Username:</strong> {{ $nama_user }}</p>
                        <p><strong>Bergabung:</strong> {{ $tanggal_gabung }}</p>
                        <p><strong>Total Transaksi:</strong> {{ $total_transaksi }}</p>
                    </div>
                    <div class="col-md-6">
                        <h5>Statistik</h5>
                        <p>Pengguna aktif sejak {{ $tanggal_gabung }}</p>
                        <p>Total {{ $total_transaksi }} transaksi</p>
                    </div>
                </div>

                <hr>

                <div class="text-center">
                    <a href="/logout" class="btn btn-warning"
                       onclick="return confirm('Yakin ingin logout?')">
                        Logout
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

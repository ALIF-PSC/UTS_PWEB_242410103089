@extends('layouts.app')

@section('judul', 'Dashboard')

@section('konten')
<div class="row">
    <div class="col-12">
        <div class="card bg-light border-0">
            <div class="card-body py-4">
                <h2 class="fw-bold text-primary mb-1">Halo, {{ $nama_user }}!</h2>
                <p class="text-muted mb-0">Selamat datang di dashboard keuangan Anda</p>
            </div>
        </div>
    </div>
</div>

@if(!$ada_data)
<div class="row mt-4">
    <div class="col-12">
        <div class="card">
            <div class="card-body text-center py-5">
                <div class="mb-4">
                    <h4 class="text-muted mb-3">Belum Ada Data Transaksi</h4>
                    <p class="text-muted">Mulai kelola keuangan Anda dengan menambahkan transaksi pertama</p>
                </div>
                <a href="/pengelolaan" class="btn btn-primary btn-lg">
                    Tambah Transaksi Pertama
                </a>
            </div>
        </div>
    </div>
</div>
@else
<div class="row mt-4">
    <div class="col-md-3 mb-3">
        <div class="card text-white bg-success">
            <div class="card-body">
                <h6 class="card-title">Saldo Total</h6>
                <h3 class="card-text">Rp {{ number_format($saldo, 0, ',', '.') }}</h3>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-3">
        <div class="card text-white bg-primary">
            <div class="card-body">
                <h6 class="card-title">Total Pemasukan</h6>
                <h3 class="card-text">Rp {{ number_format($total_masuk, 0, ',', '.') }}</h3>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-3">
        <div class="card text-white bg-danger">
            <div class="card-body">
                <h6 class="card-title">Total Pengeluaran</h6>
                <h3 class="card-text">Rp {{ number_format($total_keluar, 0, ',', '.') }}</h3>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-3">
        <div class="card text-white bg-warning">
            <div class="card-body">
                <h6 class="card-title">Jumlah Transaksi</h6>
                <h3 class="card-text">{{ count($transaksi) }}</h3>
            </div>
        </div>
    </div>
</div>

<div class="row mt-4">
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-light">
                <h5 class="mb-0 fw-bold">Transaksi Terbaru</h5>
            </div>
            <div class="card-body">
                @if(count($transaksi) > 0)
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="table-light">
                                <tr>
                                    <th>Keterangan</th>
                                    <th>Jumlah</th>
                                    <th>Jenis</th>
                                    <th>Tanggal</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach(array_slice($transaksi, -3) as $trx)
                                <tr>
                                    <td class="fw-bold">{{ $trx['keterangan'] }}</td>
                                    <td class="fw-bold {{ $trx['jenis'] == 'masuk' ? 'text-success' : 'text-danger' }}">
                                        Rp {{ number_format($trx['jumlah'], 0, ',', '.') }}
                                    </td>
                                    <td>
                                        @if($trx['jenis'] == 'masuk')
                                            <span class="badge bg-success">Pemasukan</span>
                                        @else
                                            <span class="badge bg-danger">Pengeluaran</span>
                                        @endif
                                    </td>
                                    <td class="text-muted">{{ $trx['tanggal'] }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="text-center mt-3">
                        <a href="/pengelolaan" class="btn btn-outline-primary">
                            Lihat Semua Transaksi
                        </a>
                    </div>
                @else
                    <p class="text-muted text-center">Tidak ada transaksi</p>
                @endif
            </div>
        </div>
    </div>
</div>
@endif
@endsection

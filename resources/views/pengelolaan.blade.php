@extends('layouts.app')

@section('judul', 'Pengelolaan Transaksi')

@section('konten')
<div class="row">
    <div class="col-12">
        <h2>Pengelolaan Transaksi</h2>
        <p class="text-muted">Halo {{ $nama_user }}, kelola transaksi Anda</p>
    </div>
</div>

<div class="row mt-4">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">Tambah Transaksi</h5>
            </div>
            <div class="card-body">
                <form method="POST" action="/tambah-transaksi">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Keterangan</label>
                        <input type="text" name="keterangan" class="form-control" placeholder="Contoh: Gaji, Belanja" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Jumlah (Rp)</label>
                        <input type="number" name="jumlah" class="form-control" placeholder="100000" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Jenis</label>
                        <select name="jenis" class="form-select" required>
                            <option value="">Pilih Jenis</option>
                            <option value="masuk">Pemasukan</option>
                            <option value="keluar">Pengeluaran</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Simpan Transaksi</button>
                </form>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card">
            <div class="card-header bg-success text-white">
                <h5 class="mb-0">Statistik</h5>
            </div>
            <div class="card-body">
                @php
                    $total_masuk = 0;
                    $total_keluar = 0;
                    foreach($data_transaksi as $trx) {
                        if($trx['jenis'] == 'masuk') {
                            $total_masuk += $trx['jumlah'];
                        } else {
                            $total_keluar += $trx['jumlah'];
                        }
                    }
                    $saldo = $total_masuk - $total_keluar;
                @endphp
                <p><strong>Total Pemasukan:</strong> Rp {{ number_format($total_masuk, 0, ',', '.') }}</p>
                <p><strong>Total Pengeluaran:</strong> Rp {{ number_format($total_keluar, 0, ',', '.') }}</p>
                <p><strong>Saldo:</strong> Rp {{ number_format($saldo, 0, ',', '.') }}</p>
                <p><strong>Jumlah Transaksi:</strong> {{ count($data_transaksi) }}</p>
            </div>
        </div>
    </div>
</div>

<div class="row mt-4">
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-info text-white">
                <h5 class="mb-0">Daftar Transaksi</h5>
            </div>
            <div class="card-body">
                @if(count($data_transaksi) > 0)
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Keterangan</th>
                                    <th>Jumlah</th>
                                    <th>Jenis</th>
                                    <th>Tanggal</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data_transaksi as $trx)
                                <tr>
                                    <td>{{ $trx['keterangan'] }}</td>
                                    <td class="{{ $trx['jenis'] == 'masuk' ? 'text-success' : 'text-danger' }}">
                                        Rp {{ number_format($trx['jumlah'], 0, ',', '.') }}
                                    </td>
                                    <td>
                                        @if($trx['jenis'] == 'masuk')
                                            <span class="badge bg-success">Masuk</span>
                                        @else
                                            <span class="badge bg-danger">Keluar</span>
                                        @endif
                                    </td>
                                    <td>{{ $trx['tanggal'] }}</td>
                                    <td>
                                        <a href="/hapus-transaksi/{{ $trx['id'] }}" class="btn btn-sm btn-danger"
                                           onclick="return confirm('Hapus transaksi ini?')">
                                            Hapus
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <p class="text-muted text-center">Belum ada transaksi</p>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection

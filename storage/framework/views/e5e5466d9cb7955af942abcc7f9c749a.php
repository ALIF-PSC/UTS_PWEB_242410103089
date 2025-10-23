<?php $__env->startSection('judul', 'Dashboard'); ?>

<?php $__env->startSection('konten'); ?>
<div class="row">
    <div class="col-12">
        <div class="card bg-light border-0">
            <div class="card-body py-4">
                <h2 class="fw-bold text-primary mb-1">Halo, <?php echo e($nama_user); ?>!</h2>
                <p class="text-muted mb-0">Selamat datang di dashboard keuangan Anda</p>
            </div>
        </div>
    </div>
</div>

<?php if(!$ada_data): ?>
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
<?php else: ?>
<div class="row mt-4">
    <div class="col-md-3 mb-3">
        <div class="card text-white bg-success">
            <div class="card-body">
                <h6 class="card-title">Saldo Total</h6>
                <h3 class="card-text">Rp <?php echo e(number_format($saldo, 0, ',', '.')); ?></h3>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-3">
        <div class="card text-white bg-primary">
            <div class="card-body">
                <h6 class="card-title">Total Pemasukan</h6>
                <h3 class="card-text">Rp <?php echo e(number_format($total_masuk, 0, ',', '.')); ?></h3>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-3">
        <div class="card text-white bg-danger">
            <div class="card-body">
                <h6 class="card-title">Total Pengeluaran</h6>
                <h3 class="card-text">Rp <?php echo e(number_format($total_keluar, 0, ',', '.')); ?></h3>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-3">
        <div class="card text-white bg-warning">
            <div class="card-body">
                <h6 class="card-title">Jumlah Transaksi</h6>
                <h3 class="card-text"><?php echo e(count($transaksi)); ?></h3>
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
                <?php if(count($transaksi) > 0): ?>
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
                                <?php $__currentLoopData = array_slice($transaksi, -3); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $trx): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td class="fw-bold"><?php echo e($trx['keterangan']); ?></td>
                                    <td class="fw-bold <?php echo e($trx['jenis'] == 'masuk' ? 'text-success' : 'text-danger'); ?>">
                                        Rp <?php echo e(number_format($trx['jumlah'], 0, ',', '.')); ?>

                                    </td>
                                    <td>
                                        <?php if($trx['jenis'] == 'masuk'): ?>
                                            <span class="badge bg-success">Pemasukan</span>
                                        <?php else: ?>
                                            <span class="badge bg-danger">Pengeluaran</span>
                                        <?php endif; ?>
                                    </td>
                                    <td class="text-muted"><?php echo e($trx['tanggal']); ?></td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="text-center mt-3">
                        <a href="/pengelolaan" class="btn btn-outline-primary">
                            Lihat Semua Transaksi
                        </a>
                    </div>
                <?php else: ?>
                    <p class="text-muted text-center">Tidak ada transaksi</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\neuro\Documents\Laravel\Sistem-Keuangan-Pribadi\resources\views/dashboard.blade.php ENDPATH**/ ?>
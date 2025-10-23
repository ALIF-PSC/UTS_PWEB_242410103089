<?php $__env->startSection('judul', 'Pengelolaan Transaksi'); ?>

<?php $__env->startSection('konten'); ?>
<div class="row">
    <div class="col-12">
        <h2>Pengelolaan Transaksi</h2>
        <p class="text-muted">Halo <?php echo e($nama_user); ?>, kelola transaksi Anda</p>
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
                    <?php echo csrf_field(); ?>
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
                <?php
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
                ?>
                <p><strong>Total Pemasukan:</strong> Rp <?php echo e(number_format($total_masuk, 0, ',', '.')); ?></p>
                <p><strong>Total Pengeluaran:</strong> Rp <?php echo e(number_format($total_keluar, 0, ',', '.')); ?></p>
                <p><strong>Saldo:</strong> Rp <?php echo e(number_format($saldo, 0, ',', '.')); ?></p>
                <p><strong>Jumlah Transaksi:</strong> <?php echo e(count($data_transaksi)); ?></p>
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
                <?php if(count($data_transaksi) > 0): ?>
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
                                <?php $__currentLoopData = $data_transaksi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $trx): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($trx['keterangan']); ?></td>
                                    <td class="<?php echo e($trx['jenis'] == 'masuk' ? 'text-success' : 'text-danger'); ?>">
                                        Rp <?php echo e(number_format($trx['jumlah'], 0, ',', '.')); ?>

                                    </td>
                                    <td>
                                        <?php if($trx['jenis'] == 'masuk'): ?>
                                            <span class="badge bg-success">Masuk</span>
                                        <?php else: ?>
                                            <span class="badge bg-danger">Keluar</span>
                                        <?php endif; ?>
                                    </td>
                                    <td><?php echo e($trx['tanggal']); ?></td>
                                    <td>
                                        <a href="/hapus-transaksi/<?php echo e($trx['id']); ?>" class="btn btn-sm btn-danger"
                                           onclick="return confirm('Hapus transaksi ini?')">
                                            Hapus
                                        </a>
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                <?php else: ?>
                    <p class="text-muted text-center">Belum ada transaksi</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\neuro\Documents\Laravel\Sistem-Keuangan-Pribadi\resources\views/pengelolaan.blade.php ENDPATH**/ ?>
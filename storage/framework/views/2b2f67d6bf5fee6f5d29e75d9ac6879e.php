<?php $__env->startSection('judul', 'Profile'); ?>

<?php $__env->startSection('konten'); ?>
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
                        <p><strong>Username:</strong> <?php echo e($nama_user); ?></p>
                        <p><strong>Bergabung:</strong> <?php echo e($tanggal_gabung); ?></p>
                        <p><strong>Total Transaksi:</strong> <?php echo e($total_transaksi); ?></p>
                    </div>
                    <div class="col-md-6">
                        <h5>Statistik</h5>
                        <p>Pengguna aktif sejak <?php echo e($tanggal_gabung); ?></p>
                        <p>Total <?php echo e($total_transaksi); ?> transaksi</p>
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\neuro\Documents\Laravel\Sistem-Keuangan-Pribadi\resources\views/profile.blade.php ENDPATH**/ ?>
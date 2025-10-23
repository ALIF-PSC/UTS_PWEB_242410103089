<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keuangan Saya - <?php echo $__env->yieldContent('judul'); ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        .navbar {
            background-color: #2c3e50;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .navbar-brand {
            font-weight: bold;
            font-size: 1.4rem;
        }
        .nav-link {
            color: rgba(255,255,255,0.9) !important;
            font-weight: 500;
            padding: 8px 15px;
            margin: 0 2px;
            border-radius: 5px;
            transition: all 0.3s;
        }
        .nav-link:hover {
            color: white !important;
            background-color: rgba(255,255,255,0.1);
        }
        .card {
            border-radius: 10px;
            box-shadow: 0 2px 15px rgba(0,0,0,0.1);
            border: none;
            margin-bottom: 20px;
        }
        .card-header {
            border-radius: 10px 10px 0 0 !important;
            font-weight: 600;
        }
        .footer {
            background-color: #2c3e50;
            color: white;
            padding: 20px 0;
            margin-top: auto;
        }
        .main-content {
            flex: 1;
        }
        .btn-primary {
            background-color: #3498db;
            border: none;
            padding: 12px 30px;
            font-weight: 600;
            border-radius: 6px;
            font-size: 1.1rem;
        }
        .btn-primary:hover {
            background-color: #2980b9;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="/dashboard">
                Keuangan Saya
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMenu">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarMenu">
                <div class="navbar-nav ms-auto">
                    <a class="nav-link <?php echo e(request()->is('dashboard') ? 'active' : ''); ?>" href="/dashboard">
                        Dashboard
                    </a>
                    <a class="nav-link <?php echo e(request()->is('pengelolaan') ? 'active' : ''); ?>" href="/pengelolaan">
                        Transaksi
                    </a>
                    <a class="nav-link <?php echo e(request()->is('profile') ? 'active' : ''); ?>" href="/profile">
                        Profile
                    </a>
                    <a class="nav-link text-warning fw-bold" href="/logout"
                       onclick="return confirm('Yakin ingin logout?')">
                        Logout
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <div class="main-content">
        <main class="container my-4">
            <?php if(session('pesan')): ?>
                <div class="alert alert-success alert-dismissible fade show">
                    <?php echo e(session('pesan')); ?>

                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            <?php endif; ?>

            <?php echo $__env->yieldContent('konten'); ?>
        </main>
    </div>

    <footer class="footer">
        <div class="container text-center">
            <p class="mb-0">Aplikasi Keuangan 2025</p>
            <small>Sistem Manajemen Keuangan Pribadi</small>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php /**PATH C:\Users\neuro\Documents\Laravel\Sistem-Keuangan-Pribadi\resources\views/layouts/app.blade.php ENDPATH**/ ?>
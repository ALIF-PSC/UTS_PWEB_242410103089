<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keuangan Saya - Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #112477 0%, #421370 100%);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            min-height: 100vh;
            display: flex;
            align-items: center;
        }
        .login-card {
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
            border: none;
        }
        .btn-primary {
            background: linear-gradient(135deg, #3621b1 0%, #0670b8 100%);
            border: none;
            padding: 12px;
            font-weight: 600;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card login-card">
                    <div class="card-header bg-primary text-white text-center py-3">
                        <h4 class="mb-0">Login</h4>
                    </div>
                    <div class="card-body p-4">
                        <form method="POST" action="/login">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label fw-bold">Username</label>
                                <input type="text" name="username" class="form-control" placeholder="Masukkan username" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">Password</label>
                                <input type="password" name="password" class="form-control" placeholder="Masukkan password" required>
                            </div>
                            <button type="submit" class="btn btn-primary w-100 py-2 fw-bold">Masuk</button>
                        </form>

                        <div class="mt-3 text-center">
                            <small class="text-muted">
                                Untuk demo, gunakan username dan password apa saja
                            </small>
                        </div>
                    </div>
                </div>

                <div class="text-center mt-4">
                    <small class="text-white">
                        Aplikasi Keuangan Saya 2025
                    </small>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

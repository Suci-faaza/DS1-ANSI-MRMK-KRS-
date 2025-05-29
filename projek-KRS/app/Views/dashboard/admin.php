<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f4f9;
        }

        .navbar {
            background-color: #6f42c1 !important;
            /* Ungu */
        }

        .logo-img {
            width: 40px;
            margin-right: 10px;
        }

        .card {
            transition: 0.3s ease;
        }

        .card:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
        }

        .text-primary-custom {
            color: #6f42c1;
        }
    </style>
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark shadow-sm mb-4">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold d-flex align-items-center" href="#">
                <img src="<?= base_url('img/logoumb.jpg') ?>" alt="Logo UMB" class="logo-img">
                Sistem KRS
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarAdmin"
                aria-controls="navbarAdmin" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarAdmin">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="/admin/matakuliah">📘 Kelola Mata Kuliah</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/admin/mahasiswa">🎓 Kelola Mahasiswa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/admin/dosen">👨‍🏫 Kelola Dosen</a>
                    </li>
                </ul>
                <span class="navbar-text text-white me-3">
                    👤 <?= esc(session()->get('name')) ?> (Admin)
                </span>
                <a href="/logout" class="btn btn-outline-light btn-sm">Logout</a>
            </div>
        </div>
    </nav>

    <!-- Konten -->
    <div class="container py-4">
        <div class="bg-white rounded shadow p-4">
            <h2 class="fw-bold text-primary-custom mb-3">Dashboard Admin</h2>
            <p class="lead">Selamat datang, <strong><?= esc(session()->get('name')) ?></strong>!</p>
            <p>Gunakan menu di atas untuk mengelola data akademik seperti mahasiswa, dosen, dan mata kuliah.</p>

            <hr>

            <div class="row text-center mt-4">
                <div class="col-md-4 mb-3">
                    <a href="/admin/mahasiswa" class="text-decoration-none">
                        <div class="card border-0 shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title text-primary-custom">🎓 Mahasiswa</h5>
                                <p class="card-text">Lihat dan kelola data mahasiswa.</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-4 mb-3">
                    <a href="/admin/dosen" class="text-decoration-none">
                        <div class="card border-0 shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title text-primary-custom">👨‍🏫 Dosen</h5>
                                <p class="card-text">Kelola informasi dosen.</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-4 mb-3">
                    <a href="/admin/matakuliah" class="text-decoration-none">
                        <div class="card border-0 shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title text-primary-custom">📘 Mata Kuliah</h5>
                                <p class="card-text">Atur data mata kuliah dan jadwal.</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Dashboard Mahasiswa</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f4f6fb;
            color: #2c3e50;
        }

        .navbar {
            background-color: #6f42c1;
            /* warna ungu */
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .navbar-brand img {
            height: 44px;
            margin-right: 10px;
        }

        .navbar-brand span {
            font-weight: 600;
            font-size: 18px;
            color: #fff;
        }

        .nav-link {
            color: #fff !important;
        }

        .nav-link.text-warning {
            color: #ffc107 !important;
        }

        .container {
            margin-top: 40px;
        }

        .alert {
            border-radius: 10px;
        }

        .table thead {
            background-color: #a076f2;
            color: #fff;
        }

        .table-hover tbody tr:hover {
            background-color: #f0eaff;
        }

        .btn-primary {
            background-color: #7d5bbe;
            border: none;
            border-radius: 6px;
        }

        .btn-danger {
            border-radius: 6px;
            font-size: 14px;
        }

        .total-sks-box {
            background-color: #f2e7ff;
            border: 1px solid #d0b8ff;
            padding: 12px 20px;
            border-radius: 10px;
            margin-top: 20px;
            font-weight: bold;
        }

        .page-heading {
            font-weight: 600;
            color: #5a409c;
        }
    </style>
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand d-flex align-items-center" href="#">
                <img src="<?= base_url('img/logoumb.jpg') ?>" alt="Logo UMB">
                <span>Universitas Muhammadiyah Bima</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto me-3">
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('/krs') ?>">Isi KRS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('/krs/cetak') ?>">Cetak KRS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-warning" href="<?= base_url('/logout') ?>">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Content -->
    <div class="container">
        <div class="alert alert-success shadow-sm">
            <h5 class="mb-1">Halo, <strong><?= esc(session()->get('name')) ?></strong> (Mahasiswa)</h5>
            <p class="mb-0">Selamat datang di sistem Kartu Rencana Studi.</p>
        </div>

        <h2 class="page-heading mb-3"><?= $title ?? 'Dashboard Mahasiswa' ?></h2>
        <p><?= $message ?? 'Silakan mulai mengisi KRS Anda di bawah ini.' ?></p>

        <a href="<?= base_url('/krs') ?>" class="btn btn-primary mb-3">+ Mulai Isi KRS</a>

        <?php if (!empty($matakuliah)): ?>
            <?php
            $totalSKS = 0;
            foreach ($matakuliah as $mk) {
                $totalSKS += (int) $mk['sks'];
            }
            ?>

            <div class="table-responsive">
                <table class="table table-striped table-hover align-middle">
                    <thead>
                        <tr>
                            <th>Kode</th>
                            <th>Nama Mata Kuliah</th>
                            <th>SKS</th>
                            <th>Semester</th>
                            <th>Tahun Ajaran</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($matakuliah as $mk): ?>
                            <tr>
                                <td><?= esc($mk['kode']) ?></td>
                                <td><?= esc($mk['nama']) ?></td>
                                <td><?= esc($mk['sks']) ?></td>
                                <td><?= esc($mk['semester']) ?></td>
                                <td><?= esc($mk['tahun_ajaran']) ?></td>
                                <td>
                                    <form action="<?= base_url('/krs/hapus/' . $mk['krs_id']) ?>" method="post"
                                        onsubmit="return confirm('Yakin ingin menghapus mata kuliah ini dari KRS?');">
                                        <?= csrf_field() ?>
                                        <button type="submit" class="btn btn-danger btn-sm">🗑️ Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <div class="total-sks-box">
                Total SKS yang diambil: <?= $totalSKS ?> SKS
            </div>

        <?php else: ?>
            <div class="alert alert-warning mt-4">
                Anda belum mengisi KRS. Silakan mulai isi melalui tombol di atas.
            </div>
        <?php endif; ?>
    </div>

    <!-- Bootstrap Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
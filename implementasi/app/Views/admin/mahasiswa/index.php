<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Kelola Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            position: relative;
        }

        .background-blur-logo {
            position: fixed;
            top: 50%;
            left: 50%;
            width: 600px;
            height: auto;
            transform: translate(-50%, -50%);
            z-index: 0;
            opacity: 0.1;
            filter: blur(3px);
            pointer-events: none;
        }

        .content {
            position: relative;
            z-index: 1;
        }

        .btn-primary {
            background-color: #6f42c1;
            border-color: #6f42c1;
        }

        .btn-primary:hover {
            background-color: #5a36a0;
        }

        .table td,
        .table th {
            vertical-align: middle;
        }
    </style>
</head>

<body>

    <!-- LOGO BLUR DI BELAKANG -->
    <img src="<?= base_url('img/logoumb.jpg') ?>" alt="Logo UMB" class="background-blur-logo">

    <div class="container py-5 content">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold text-primary">Kelola Mahasiswa</h2>
            <div>
                <a href="/dashboard/admin" class="btn btn-outline-secondary me-2">← Kembali</a>
                <a href="/admin/mahasiswa/tambah" class="btn btn-primary">+ Tambah Mahasiswa</a>
            </div>
        </div>

        <div class="card shadow-sm border-0">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead class="table-light text-center">
                            <tr>
                                <th>Nama</th>
                                <th>NIM</th>
                                <th>Prodi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($mahasiswa as $mhs): ?>
                                <tr>
                                    <td><?= esc($mhs['nama']) ?></td>
                                    <td><?= esc($mhs['nim']) ?></td>
                                    <td><?= esc($mhs['prodi']) ?></td>
                                    <td class="text-center">
                                        <a href="/admin/mahasiswa/edit/<?= $mhs['id'] ?>"
                                            class="btn btn-sm btn-warning me-1">
                                            ✏️ Edit
                                        </a>
                                        <a href="/admin/mahasiswa/hapus/<?= $mhs['id'] ?>" class="btn btn-sm btn-danger"
                                            onclick="return confirm('Yakin ingin menghapus mahasiswa ini?')">
                                            🗑️ Hapus
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            <?php if (empty($mahasiswa)): ?>
                                <tr>
                                    <td colspan="4" class="text-center text-muted py-3">Tidak ada data mahasiswa.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
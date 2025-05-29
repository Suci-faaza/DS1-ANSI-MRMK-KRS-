<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Kelola Dosen</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            position: relative;
        }

        .background-logo {
            position: fixed;
            top: 50%;
            left: 50%;
            width: 500px;
            transform: translate(-50%, -50%);
            opacity: 0.06;
            filter: blur(2px);
            z-index: 0;
            pointer-events: none;
        }

        .content {
            position: relative;
            z-index: 1;
        }

        .btn-purple {
            background-color: #6f42c1;
            border-color: #6f42c1;
            color: white;
        }

        .btn-purple:hover {
            background-color: #5931a4;
        }
    </style>
</head>

<body>

    <!-- Logo UMB di belakang -->
    <img src="<?= base_url('img/logoumb.jpg') ?>" class="background-logo" alt="Logo UMB">

    <div class="container py-5 content">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold text-primary">Kelola Dosen</h2>
            <div>
                <a href="/dashboard/admin" class="btn btn-outline-secondary me-2">← Kembali</a>
                <a href="/admin/dosen/tambah" class="btn btn-purple">+ Tambah Dosen</a>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-hover table-striped align-middle shadow-sm rounded">
                <thead class="table-primary">
                    <tr>
                        <th>Nama</th>
                        <th>NIP</th>
                        <th>Prodi</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($dosen as $dsn): ?>
                        <tr>
                            <td><?= esc($dsn['nama']) ?></td>
                            <td><?= esc($dsn['nip']) ?></td>
                            <td><?= esc($dsn['prodi']) ?></td>
                            <td class="text-center">
                                <a href="/admin/dosen/edit/<?= $dsn['id'] ?>" class="btn btn-sm btn-warning me-1">✏️
                                    Edit</a>
                                <a href="/admin/dosen/hapus/<?= $dsn['id'] ?>" class="btn btn-sm btn-danger"
                                    onclick="return confirm('Yakin ingin menghapus dosen ini?')">🗑️ Hapus</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    <?php if (empty($dosen)): ?>
                        <tr>
                            <td colspan="4" class="text-center text-muted">Belum ada data dosen.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

</body>

</html>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Kelola Mata Kuliah</title>
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
            opacity: 0.05;
            transform: translate(-50%, -50%);
            filter: blur(3px);
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

        .table thead th {
            white-space: nowrap;
        }
    </style>
</head>

<body>

    <!-- Logo background blur -->
    <img src="<?= base_url('img/logoumb.jpg') ?>" class="background-logo" alt="Logo UMB">

    <div class="container py-5 content">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold text-primary">Kelola Mata Kuliah</h2>
            <div>
                <a href="/dashboard/admin" class="btn btn-outline-secondary me-2">← Kembali</a>
                <a href="/admin/matakuliah/tambah" class="btn btn-purple">+ Tambah Mata Kuliah</a>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-hover table-striped align-middle shadow-sm rounded">
                <thead class="table-primary text-center">
                    <tr>
                        <th>Kode</th>
                        <th>Nama</th>
                        <th>SKS</th>
                        <th>Semester</th>
                        <th>Kelas</th>
                        <th>Ruang</th>
                        <th>Hari</th>
                        <th>Waktu</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($matakuliah as $mk): ?>
                        <tr class="text-center">
                            <td><?= esc($mk['kode']) ?></td>
                            <td class="text-start"><?= esc($mk['nama']) ?></td>
                            <td><?= esc($mk['sks']) ?></td>
                            <td><?= esc($mk['semester']) ?></td>
                            <td><?= esc($mk['kelas']) ?></td>
                            <td><?= esc($mk['ruang']) ?></td>
                            <td><?= esc($mk['hari']) ?></td>
                            <td><?= esc($mk['waktu']) ?></td>
                            <td>
                                <a href="/admin/matakuliah/edit/<?= $mk['id'] ?>" class="btn btn-sm btn-warning me-1">✏️</a>
                                <a href="/admin/matakuliah/hapus/<?= $mk['id'] ?>" class="btn btn-sm btn-danger"
                                    onclick="return confirm('Yakin hapus?')">🗑️</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    <?php if (empty($matakuliah)): ?>
                        <tr>
                            <td colspan="9" class="text-center text-muted">Belum ada data mata kuliah.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

    </div>
</body>

</html>
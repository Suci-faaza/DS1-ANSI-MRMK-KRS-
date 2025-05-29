<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Dashboard Dosen</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .navbar {
            background-color: #6f42c1 !important;
        }

        .card-header {
            background-color: #d6c8f0;
        }

        .badge-total {
            background-color: #6f42c1;
            font-size: 0.9rem;
        }

        .search-box {
            max-width: 300px;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark mb-4">
        <div class="container-fluid">
            <a class="navbar-brand d-flex align-items-center" href="<?= base_url('/dashboard/dosen') ?>">
                <img src="<?= base_url('img/logoumb.jpg') ?>" alt="Logo" width="40" class="me-2">
                <strong>UM Bima - Dosen</strong>
            </a>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <span class="nav-link text-white"><?= esc(session()->get('name')) ?> (Dosen)</span>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url('/logout') ?>" class="nav-link text-white">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mb-5">
        <h3 class="mb-3">Halo, <?= esc(session()->get('name')) ?> 👋</h3>
        <p class="mb-4 text-muted">Berikut adalah daftar mata kuliah yang Anda ampu beserta mahasiswa yang mengambilnya.
        </p>

        <?php if (!empty($matakuliah)): ?>
            <?php foreach ($matakuliah as $mk): ?>
                <div class="card mb-4 shadow-sm border-0">
                    <div class="card-header">
                        <strong><?= esc($mk['nama']) ?></strong> (<?= esc($mk['kode']) ?>)
                        <span class="badge rounded-pill badge-total"><?= count($mk['mahasiswa']) ?> Mahasiswa</span><br>
                        Semester: <?= esc($mk['semester']) ?> | Kelas: <?= esc($mk['kelas']) ?> | Ruang:
                        <?= esc($mk['ruang']) ?> | Hari: <?= esc($mk['hari']) ?> | Jam: <?= esc($mk['waktu']) ?>
                    </div>

                    <div class="card-body">
                        <!-- Search box -->
                        <input type="text" class="form-control mb-3 search-box" placeholder="Cari mahasiswa..."
                            onkeyup="filterTable(this)" data-target="table<?= $mk['id'] ?>">

                        <div class="table-responsive">
                            <table class="table table-bordered table-striped mb-0" id="table<?= $mk['id'] ?>">
                                <thead class="table-light">
                                    <tr>
                                        <th style="width: 5%;">No</th>
                                        <th>Nama Mahasiswa</th>
                                        <th>NIM</th>
                                        <th>Prodi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($mk['mahasiswa'])): ?>
                                        <?php foreach ($mk['mahasiswa'] as $i => $mhs): ?>
                                            <tr>
                                                <td><?= $i + 1 ?></td>
                                                <td><?= esc($mhs['nama']) ?></td>
                                                <td><?= esc($mhs['nim']) ?></td>
                                                <td><?= esc($mhs['prodi']) ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="4" class="text-center text-muted">Belum ada mahasiswa yang mengambil mata
                                                kuliah ini.</td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="alert alert-info">Anda belum memiliki mata kuliah yang diampu saat ini.</div>
        <?php endif; ?>
    </div>

    <script>
        function filterTable(input) {
            const tableId = input.getAttribute('data-target');
            const filter = input.value.toLowerCase();
            const rows = document.querySelectorAll(`#${tableId} tbody tr`);
            rows.forEach(row => {
                const text = row.innerText.toLowerCase();
                row.style.display = text.includes(filter) ? '' : 'none';
            });
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
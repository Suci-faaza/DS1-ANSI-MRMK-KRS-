<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Cetak KRS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        @media print {
            .no-print {
                display: none;
            }
        }

        .logo-umb {
            width: 80px;
            height: auto;
        }

        .header-kampus {
            text-align: center;
            margin-bottom: 20px;
            position: relative;
            z-index: 2;
        }

        .header-kampus h5,
        .header-kampus h6 {
            margin: 0;
        }

        hr {
            border: 1px solid black;
        }

        /* Watermark Besar di Belakang */
        .watermark {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            opacity: 0.05;
            z-index: 0;
            width: 700px;
        }
    </style>
</head>

<body class="p-4">

    <!-- Watermark Besar -->
    <img src="<?= base_url('img/logoumb.jpg') ?>" alt="Watermark UMB" class="watermark">

    <div class="container position-relative">
        <div class="header-kampus">
            <img src="<?= base_url('img/logoumb.jpg') ?>" alt="Logo UMB" class="logo-umb mb-2">
            <h5>UNIVERSITAS MUHAMMADIYAH BIMA</h5>
            <h6>Program Studi Ilmu Komputer</h6>
            <hr>
            <h4 class="mt-3 mb-2">Kartu Rencana Studi (KRS)</h4>
            <p><strong>Nama:</strong> <?= esc($mahasiswa['nama']) ?> | <strong>NIM:</strong>
                <?= esc($mahasiswa['nim']) ?></p>
        </div>

        <?php if (!empty($matakuliah)): ?>
            <table class="table table-bordered">
                <thead class="table-light">
                    <tr>
                        <th>No</th>
                        <th>Kode</th>
                        <th>Nama Mata Kuliah</th>
                        <th>SKS</th>
                        <th>Semester</th>
                        <th>Tahun Ajaran</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    $total_sks = 0;
                    foreach ($matakuliah as $mk):
                        $total_sks += $mk['sks'];
                        ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= esc($mk['kode']) ?></td>
                            <td><?= esc($mk['nama']) ?></td>
                            <td><?= esc($mk['sks']) ?></td>
                            <td><?= esc(ucfirst($mk['semester'])) ?></td>
                            <td><?= esc($mk['tahun_ajaran']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                    <tr>
                        <th colspan="3" class="text-end">Total SKS</th>
                        <th><?= $total_sks ?></th>
                        <th colspan="2"></th>
                    </tr>
                </tbody>
            </table>
        <?php else: ?>
            <div class="alert alert-warning">
                Anda belum mengisi KRS.
            </div>
        <?php endif; ?>

        <div class="text-center mt-4 no-print">
            <button onclick="window.print()" class="btn btn-primary">🖨️ Cetak KRS</button>
            <a href="<?= base_url('/dashboard/mahasiswa') ?>" class="btn btn-secondary">🔙 Kembali</a>
        </div>
    </div>

</body>

</html>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Isi KRS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f4f0fa;
            position: relative;
            min-height: 100vh;
            overflow-x: hidden;
        }

        /* Logo Background Besar */
        .background-logo {
            position: absolute;
            top: 50%;
            left: 50%;
            width: 500px;
            height: auto;
            opacity: 0.07;
            transform: translate(-50%, -50%);
            z-index: 0;
            filter: blur(1px);
        }

        .form-container {
            position: relative;
            z-index: 2;
            background: white;
            border-radius: 16px;
            padding: 35px;
            max-width: 600px;
            margin: 80px auto;
            box-shadow: 0 12px 28px rgba(0, 0, 0, 0.1);
        }

        .form-container h3 {
            color: #6f42c1;
            font-weight: 600;
            margin-bottom: 25px;
            text-align: center;
        }

        .btn-purple {
            background-color: #6f42c1;
            color: white;
            border: none;
        }

        .btn-purple:hover {
            background-color: #5931a4;
        }

        .form-label {
            font-weight: 500;
        }
    </style>
</head>

<body>

    <!-- Logo Background Besar -->
    <img src="<?= base_url('img/logoumb.jpg') ?>" alt="Logo UMB" class="background-logo">

    <div class="container">
        <div class="form-container">

            <h3>Isi Kartu Rencana Studi (KRS)</h3>

            <?php if (session()->getFlashdata('success')): ?>
                <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
            <?php endif; ?>
            <?php if (session()->getFlashdata('error')): ?>
                <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
            <?php endif; ?>

            <form action="<?= base_url('/krs/store') ?>" method="post">
                <?= csrf_field() ?>

                <div class="mb-3">
                    <label for="matakuliah_id" class="form-label">Pilih Mata Kuliah</label>
                    <select class="form-select" name="matakuliah_id" id="matakuliah_id" required>
                        <option value="">-- Pilih Mata Kuliah --</option>
                        <?php foreach ($matakuliah as $mk): ?>
                            <option value="<?= $mk['id'] ?>">
                                <?= $mk['kode'] ?> - <?= $mk['nama'] ?> (<?= $mk['sks'] ?> SKS)
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="tahun_ajaran" class="form-label">Tahun Ajaran</label>
                    <input type="text" class="form-control" name="tahun_ajaran" id="tahun_ajaran"
                        value="<?= date('Y') . '/' . (date('Y') + 1) ?>" required>
                </div>

                <div class="mb-4">
                    <label for="semester" class="form-label">Semester</label>
                    <select name="semester" id="semester" class="form-select" required>
                        <option value="">-- Pilih Semester --</option>
                        <option value="ganjil">Ganjil</option>
                        <option value="genap">Genap</option>
                    </select>
                </div>

                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-purple">✅ Simpan KRS</button>
                    <a href="<?= base_url('/dashboard/mahasiswa') ?>" class="btn btn-secondary">🔙 Kembali</a>
                </div>
            </form>

        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
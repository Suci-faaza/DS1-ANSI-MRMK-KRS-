<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title><?= isset($mahasiswa) ? 'Edit' : 'Tambah' ?> Mahasiswa</title>
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
            height: auto;
            transform: translate(-50%, -50%);
            z-index: 0;
            opacity: 0.06;
            filter: blur(2px);
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
            background-color: #5a36a0;
        }
    </style>
</head>

<body class="py-5">

    <!-- Logo UMB di belakang -->
    <img src="<?= base_url('img/logoumb.jpg') ?>" alt="Logo UMB" class="background-logo">

    <div class="container content">
        <div class="card shadow-sm border-0">
            <div class="card-body">
                <h3 class="mb-4 text-primary"><?= isset($mahasiswa) ? 'Edit' : 'Tambah' ?> Mahasiswa</h3>

                <form
                    action="<?= isset($mahasiswa) ? '/admin/mahasiswa/update/' . $mahasiswa['id'] : '/admin/mahasiswa/simpan' ?>"
                    method="post">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" name="nama" id="nama" class="form-control"
                            value="<?= isset($mahasiswa) ? esc($mahasiswa['nama']) : '' ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="nim" class="form-label">NIM</label>
                        <input type="text" name="nim" id="nim" class="form-control"
                            value="<?= isset($mahasiswa) ? esc($mahasiswa['nim']) : '' ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="prodi" class="form-label">Prodi</label>
                        <input type="text" name="prodi" id="prodi" class="form-control"
                            value="<?= isset($mahasiswa) ? esc($mahasiswa['prodi']) : '' ?>" required>
                    </div>

                    <?php if (!isset($mahasiswa)): ?>
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" name="username" id="username" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" id="password" class="form-control" required>
                        </div>
                    <?php endif; ?>

                    <div class="d-flex justify-content-end mt-4">
                        <a href="/admin/mahasiswa" class="btn btn-secondary me-2">Batal</a>
                        <button type="submit"
                            class="btn btn-purple"><?= isset($mahasiswa) ? 'Update' : 'Simpan' ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>

</html>
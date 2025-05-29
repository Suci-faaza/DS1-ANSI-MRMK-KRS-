<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title><?= isset($dosen) ? 'Edit' : 'Tambah' ?> Dosen</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            position: relative;
            min-height: 100vh;
        }

        .background-logo {
            position: fixed;
            top: 50%;
            left: 50%;
            width: 500px;
            opacity: 0.05;
            transform: translate(-50%, -50%);
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

    <!-- Logo Background -->
    <img src="<?= base_url('img/logoumb.jpg') ?>" class="background-logo" alt="Logo UMB">

    <div class="container py-5 content">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="card shadow-sm">
                    <div class="card-header bg-purple text-white fw-bold">
                        <?= isset($dosen) ? 'Edit Dosen' : 'Tambah Dosen' ?>
                    </div>
                    <div class="card-body">
                        <form
                            action="<?= isset($dosen) ? base_url('/admin/dosen/update/' . $dosen['id']) : base_url('/admin/simpan-dosen') ?>"
                            method="post">
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama Dosen</label>
                                <input type="text" name="nama" id="nama" class="form-control"
                                    value="<?= isset($dosen) ? esc($dosen['nama']) : '' ?>" required>
                            </div>

                            <div class="mb-3">
                                <label for="nip" class="form-label">NIP</label>
                                <input type="text" name="nip" id="nip" class="form-control"
                                    value="<?= isset($dosen) ? esc($dosen['nip']) : '' ?>" required>
                            </div>

                            <div class="mb-3">
                                <label for="prodi" class="form-label">Prodi</label>
                                <input type="text" name="prodi" id="prodi" class="form-control"
                                    value="<?= isset($dosen) ? esc($dosen['prodi']) : '' ?>" required>
                            </div>

                            <?php if (!isset($dosen)): ?>
                                <div class="mb-3">
                                    <label for="username" class="form-label">Username</label>
                                    <input type="text" name="username" id="username" class="form-control" required>
                                </div>

                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" name="password" id="password" class="form-control" required>
                                </div>
                            <?php endif; ?>

                            <div class="d-flex justify-content-between">
                                <button type="submit" class="btn btn-purple">💾 Simpan</button>
                                <a href="<?= base_url('/admin/dosen') ?>" class="btn btn-secondary">Batal</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title><?= isset($matakuliah) ? 'Edit' : 'Tambah' ?> Mata Kuliah</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .form-container {
            background: white;
            padding: 2rem;
            border-radius: 1rem;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            margin-top: 2rem;
        }

        .form-title {
            color: #6f42c1;
            font-weight: bold;
        }

        label {
            font-weight: 500;
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
    <div class="container">
        <div class="form-container">
            <h3 class="form-title mb-4"><?= isset($matakuliah) ? 'Edit' : 'Tambah' ?> Mata Kuliah</h3>
            <form
                action="<?= isset($matakuliah) ? '/admin/matakuliah/update/' . $matakuliah['id'] : '/admin/matakuliah/simpan' ?>"
                method="post">
                <div class="mb-3">
                    <label for="kode">Kode</label>
                    <input type="text" id="kode" name="kode" class="form-control"
                        value="<?= isset($matakuliah) ? esc($matakuliah['kode']) : '' ?>" required>
                </div>
                <div class="mb-3">
                    <label for="nama">Nama Mata Kuliah</label>
                    <input type="text" id="nama" name="nama" class="form-control"
                        value="<?= isset($matakuliah) ? esc($matakuliah['nama']) : '' ?>" required>
                </div>
                <div class="mb-3">
                    <label for="sks">SKS</label>
                    <input type="number" id="sks" name="sks" class="form-control"
                        value="<?= isset($matakuliah) ? esc($matakuliah['sks']) : '' ?>" required>
                </div>
                <div class="mb-3">
                    <label for="semester">Semester</label>
                    <select id="semester" name="semester" class="form-select" required>
                        <option value="">-- Pilih --</option>
                        <option value="ganjil" <?= isset($matakuliah) && $matakuliah['semester'] == 'ganjil' ? 'selected' : '' ?>>Ganjil</option>
                        <option value="genap" <?= isset($matakuliah) && $matakuliah['semester'] == 'genap' ? 'selected' : '' ?>>Genap</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="kelas">Kelas</label>
                    <input type="text" id="kelas" name="kelas" class="form-control"
                        value="<?= isset($matakuliah) ? esc($matakuliah['kelas']) : '' ?>">
                </div>
                <div class="mb-3">
                    <label for="ruang">Ruang</label>
                    <input type="text" id="ruang" name="ruang" class="form-control"
                        value="<?= isset($matakuliah) ? esc($matakuliah['ruang']) : '' ?>">
                </div>
                <div class="mb-3">
                    <label for="hari">Hari</label>
                    <input type="text" id="hari" name="hari" class="form-control"
                        value="<?= isset($matakuliah) ? esc($matakuliah['hari']) : '' ?>">
                </div>
                <div class="mb-3">
                    <label for="waktu">Waktu</label>
                    <input type="text" id="waktu" name="waktu" class="form-control"
                        value="<?= isset($matakuliah) ? esc($matakuliah['waktu']) : '' ?>">
                </div>
                <div class="mb-4">
                    <label for="dosen_id">Dosen Pengampu</label>
                    <select id="dosen_id" name="dosen_id" class="form-select" required>
                        <option value="">-- Pilih Dosen --</option>
                        <?php foreach ($daftarDosen as $d): ?>
                            <option value="<?= $d['id']; ?>" <?= isset($matakuliah) && $matakuliah['dosen_id'] == $d['id'] ? 'selected' : '' ?>>
                                <?= esc($d['nama']); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-purple">💾 Simpan</button>
                    <a href="/admin/matakuliah" class="btn btn-secondary">Batal</a>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
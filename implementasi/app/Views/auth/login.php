<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <title>Login Sistem KRS - Universitas Muhammadiyah Bima</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">

  <style>
    body {
      margin: 0;
      padding: 0;
      font-family: 'Inter', sans-serif;
      height: 100vh;
      background-color: #f0f4f8;
      position: relative;
      overflow: hidden;
    }

    /* Background Logo Besar */
    .background-logo {
      position: absolute;
      top: 50%;
      left: 50%;
      width: 700px;
      height: 700px;
      background: url('<?= base_url('img/logoumb.jpg') ?>') no-repeat center center;
      background-size: contain;
      opacity: 0.07;
      filter: blur(1.5px);
      transform: translate(-50%, -50%);
      z-index: 0;
    }

    .login-container {
      position: relative;
      z-index: 1;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      padding: 20px;
    }

    #login-card {
      background-color: rgba(255, 255, 255, 0.96);
      border-radius: 20px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
      padding: 40px;
      width: 100%;
      max-width: 400px;
      animation: fadeIn 0.6s ease-out;
    }

    .login-title {
      font-size: 20px;
      font-weight: 700;
      text-align: center;
      color: #2c3e50;
      margin-bottom: 30px;
    }

    .form-label {
      font-weight: 600;
      color: #34495e;
    }

    .form-control {
      border-radius: 10px;
      padding: 12px;
    }

    .btn-primary {
      background-color: #2980b9;
      border: none;
      border-radius: 10px;
      padding: 12px;
      font-weight: 600;
      transition: 0.3s ease;
    }

    .btn-primary:hover {
      background-color: #2471a3;
      transform: scale(1.02);
    }

    .alert {
      border-radius: 10px;
      font-size: 14px;
    }

    @keyframes fadeIn {
      from {
        opacity: 0;
        transform: translateY(20px);
      }

      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    @media screen and (max-width: 576px) {
      .background-logo {
        width: 400px;
        height: 400px;
      }
    }
  </style>
</head>

<body>

  <!-- Background Logo -->
  <div class="background-logo"></div>

  <!-- Login Form -->
  <div class="login-container">
    <div id="login-card">
      <div class="login-title">
        🔐 Login Sistem KRS <br>Universitas Muhammadiyah Bima
      </div>

      <?php if (session()->getFlashdata('error')): ?>
        <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
      <?php endif; ?>

      <form action="<?= base_url('/auth/login') ?>" method="post">
        <div class="mb-3">
          <label for="username" class="form-label">👤 Username</label>
          <input type="text" name="username" id="username" class="form-control" required autofocus>
        </div>

        <div class="mb-4">
          <label for="password" class="form-label">🔑 Password</label>
          <input type="password" name="password" id="password" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary w-100">Masuk</button>
      </form>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Enterprise SSO</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="<?= base_url('vendor/almasaeed2010/adminlte/dist/css/adminlte.min.css') ?>">
  <link rel="stylesheet" href="<?= base_url('vendor/almasaeed2010/adminlte/plugins/fontawesome-free/css/all.min.css') ?>">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav ml-auto">
      <?php if (session()->has('user')): ?>
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <img src="<?= session('user.picture') ?>" class="img-size-32 mr-2 img-circle" alt="User Image">
            <?= esc(session('user.name')) ?>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <a href="<?= base_url('logout') ?>" class="dropdown-item">Logout</a>
          </div>
        </li>
      <?php else: ?>
        <li class="nav-item"><a href="<?= base_url('login') ?>" class="nav-link">Login</a></li>
      <?php endif; ?>
    </ul>
  </nav>
  <div class="content-wrapper p-4">
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12 text-center">
            <h1>Welcome to the Enterprise SSO</h1>
            <?php if (session()->has('user')): ?>
              <p>You are logged in as <?= esc(session('user.email')) ?>.</p>
              <div class="row justify-content-center">
                <div class="col-sm-4 col-md-3 text-center mb-3">
                  <a href="#" class="btn btn-app bg-primary">
                    <i class="fas fa-coins"></i> SIMKEU
                  </a>
                </div>
                <div class="col-sm-4 col-md-3 text-center mb-3">
                  <a href="#" class="btn btn-app bg-secondary">
                    <i class="fas fa-envelope"></i> Sistem Informasi Persuratan
                  </a>
                </div>
                <div class="col-sm-4 col-md-3 text-center mb-3">
                  <a href="#" class="btn btn-app bg-success">
                    <i class="fas fa-id-badge"></i> Sistem Informasi Kepegawaian
                  </a>
                </div>
              </div>
            <?php else: ?>
              <p>Please login using your Google account.</p>
              <a href="<?= base_url('login') ?>" class="btn btn-primary">Login with Google</a>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </section>
  </div>
</div>
<script src="<?= base_url('vendor/almasaeed2010/adminlte/plugins/jquery/jquery.min.js') ?>"></script>
<script src="<?= base_url('vendor/almasaeed2010/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
<script src="<?= base_url('vendor/almasaeed2010/adminlte/dist/js/adminlte.min.js') ?>"></script>
</body>
</html>

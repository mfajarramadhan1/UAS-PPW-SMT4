<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login - FAJAR FISHING</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>
    :root {
    --primary-color: #1a6fc9;
    --secondary-color: #0d4b8a;
  }

    body {
      background-color: #f8f9fa;
    }

    .navbar {
      background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
      box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }

    .btn-fishing {
      background-color: var(--primary-color);
      color: white;
      border: none;
    }

    .btn-fishing:hover {
      background-color: var(--secondary-color);
      color: white;
    }

    .auth-container {
      max-width: 500px;
      margin: 60px auto;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 5px 15px rgba(0,0,0,0.1);
      background-color: white;
    }

    .auth-header {
      text-align: center;
      margin-bottom: 30px;
    }

    .auth-header i {
      font-size: 3rem;
      color: var(--primary-color);
      margin-bottom: 15px;
    }

    .form-control:focus {
      border-color: var(--primary-color);
      box-shadow: 0 0 0 0.25rem rgba(26, 111, 201, 0.25);
    }

    .auth-footer {
      text-align: center;
      margin-top: 20px;
    }
  </style>
</head>
<body>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
      <a class="navbar-brand" href="/">
        <i class="fas fa-fish me-2"></i>TOKO ALAT PANCING FAJAR
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item"><a class="nav-link" href="/">Beranda</a></li>
          <li class="nav-item"><a class="nav-link" href="/#produk">Produk</a></li>
          <li class="nav-item"><a class="nav-link active" href="/login">Login</a></li>
          <li class="nav-item"><a class="nav-link" href="/register">Daftar</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Login Form -->
  <div class="container">
    <div class="auth-container">
      <div class="auth-header">
        <i class="fas fa-sign-in-alt"></i>
        <h2>Masuk ke Akun Anda</h2>
        <p class="text-muted">Silakan masukkan email dan password Anda</p>
      </div>

      @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
      @endif

      @if ($errors->any())
        <div class="alert alert-danger">
          <ul class="mb-0">
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input type="email" class="form-control" name="email" id="email" required autofocus>
        </div>

        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input type="password" class="form-control" name="password" id="password" required>
        </div>

        <div class="mb-3 form-check">
          <input type="checkbox" class="form-check-input" id="remember" name="remember">
          <label class="form-check-label" for="remember">Ingat saya</label>
        </div>

        <button type="submit" class="btn btn-fishing w-100 py-2">Masuk</button>
      </form>

      <div class="auth-footer">
        <p>Belum punya akun? <a href="/register">Daftar sekarang</a></p>
      </div>
    </div>
  </div>
</body>
</html>

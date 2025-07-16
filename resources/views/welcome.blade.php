<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Toko Alat Pancing "FAJAR FISHING"</title>
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

    .hero-section {
      background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), 
                  url('https://img.freepik.com/free-photo/fishing-rods-with-reels-lying-grass_23-2149435429.jpg');
      background-size: cover;
      background-position: center;
      padding: 100px 0;
      color: white;
      margin-bottom: 30px;
      border-radius: 0 0 20px 20px;
    }

    .splash-section {
      background-color: white;
      padding: 60px 0;
      margin: 40px 0;
      box-shadow: 0 5px 15px rgba(0,0,0,0.05);
    }

    .product-card {
      transition: all 0.3s ease;
      border: none;
      border-radius: 10px;
      overflow: hidden;
      box-shadow: 0 5px 15px rgba(0,0,0,0.1);
      margin-bottom: 20px;
      background-color: white;
    }

    .product-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 10px 25px rgba(0,0,0,0.15);
    }

    .product-img {
      height: 200px;
      object-fit: cover;
      transition: transform 0.3s ease;
    }

    .product-card:hover .product-img {
      transform: scale(1.03);
    }

    .price {
      color: var(--primary-color);
      font-weight: bold;
      font-size: 1.2rem;
    }

    .badge-discount {
      position: absolute;
      top: 10px;
      right: 10px;
      background-color: #ff5722;
      color: white;
      padding: 5px 10px;
      border-radius: 5px;
      font-size: 0.8rem;
    }

    .btn-fishing {
      background-color: var(--primary-color);
      color: white;
      border: none;
      padding: 8px 15px;
      border-radius: 5px;
      transition: all 0.3s ease;
    }

    .btn-fishing:hover {
      background-color: var(--secondary-color);
      transform: translateY(-2px);
    }

    .feature-icon {
      font-size: 2.5rem;
      color: var(--primary-color);
      margin-bottom: 15px;
    }
  </style>
</head>
<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
      <a class="navbar-brand" href="#">
        <i class="fas fa-fish me-2"></i>TOKO ALAT PANCING FAJAR
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link active" href="#">Beranda</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#produk">Produk</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="login">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link position-relative" href="keranjang">
              <i class="fas fa-shopping-cart"></i>
              <span id="cartCount" class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                {{ session('cart') ? collect(session('cart'))->sum('quantity') : 0 }}
              </span>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Hero Section -->
  <section class="hero-section">
    <div class="container text-center">
      <h1 class="display-4 fw-bold mb-4">Toko Alat Pancing Terlengkap</h1>
      <p class="lead">Temukan peralatan pancing berkualitas untuk petualangan memancing Anda</p>
    </div>
  </section>

  <!-- Splash Section -->
  <section class="splash-section">
    <div class="container">
      <div class="row text-center">
        <div class="col-md-4 mb-4 mb-md-0">
          <div class="feature-icon">
            <i class="fas fa-shipping-fast"></i>
          </div>
          <h3>Gratis Ongkir</h3>
          <p>Gratis ongkos kirim untuk pembelian di atas Rp500.000</p>
        </div>
        <div class="col-md-4 mb-4 mb-md-0">
          <div class="feature-icon">
            <i class="fas fa-undo"></i>
          </div>
          <h3>Garansi 7 Hari</h3>
          <p>Garansi pengembalian produk dalam 7 hari</p>
        </div>
        <div class="col-md-4">
          <div class="feature-icon">
            <i class="fas fa-headset"></i>
          </div>
          <h3>Bantuan 24/7</h3>
          <p>Layanan pelanggan siap membantu kapan saja</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Product Section -->
  <section id="produk" class="py-5 bg-light">
    <div class="container">
      <h2 class="text-center mb-5">Produk Unggulan Kami sarankan</h2>
      <div class="row">

        <!-- Product 1 -->
        <div class="col-md-6 col-lg-3">
          <div class="product-card h-100">
            <div class="position-relative">
              <img src="https://i.pinimg.com/236x/5c/64/8c/5c648c101549466ddc9587fd9746964e.jpg" class="card-img-top product-img" alt="Reel Pancing">
              <span class="badge-discount">DISKON 20%</span>
            </div>
            <div class="card-body">
              <h5 class="card-title">Reel Pancing Shimano</h5>
              <p class="card-text">Reel pancing shimano berkualitas tinggi dengan sistem drag halus dan konstruksi kokoh cocok untuk mancing di lautan dan di danau.</p>
              <div class="d-flex justify-content-between align-items-center">
                <span class="price">Rp800.000</span>
                <form method="POST" action="{{ route('cart.add') }}">
                  @csrf
                  <input type="hidden" name="name" value="Reel Pancing Shimano">
                  <input type="hidden" name="price" value="800000">
                  <input type="hidden" name="quantity" value="1">
                  <button type="submit" class="btn btn-fishing btn-sm">
                    <i class="fas fa-cart-plus"></i> Tambah
                  </button>
                </form>
              </div>
            </div>
          </div>
        </div>

        <!-- Product 2 -->
        <div class="col-md-6 col-lg-3">
          <div class="product-card h-100">
            <div class="position-relative">
              <img src="https://i.pinimg.com/236x/32/33/cf/3233cf5f9b4fcc63c74ce3d2125ffbfb.jpg" class="card-img-top product-img" alt="Umpan Buatan">
            </div>
            <div class="card-body">
              <h5 class="card-title">Umpan Buatan Berkualitas</h5>
              <p class="card-text">Setingan Umpan buatan berbagai warna dan ukuran untuk semua jenis ikan yang lebih cepat menarik perhatian ikan predator.</p>
              <div class="d-flex justify-content-between align-items-center">
                <span class="price">Rp200.000</span>
                <form method="POST" action="{{ route('cart.add') }}">
                  @csrf
                  <input type="hidden" name="name" value="Umpan Buatan Berkualitas">
                  <input type="hidden" name="price" value="200000">
                  <input type="hidden" name="quantity" value="1">
                  <button type="submit" class="btn btn-fishing btn-sm">
                    <i class="fas fa-cart-plus"></i> Tambah
                  </button>
                </form>
              </div>
            </div>
          </div>
        </div>

        <!-- Product 3 -->
        <div class="col-md-6 col-lg-3">
          <div class="product-card h-100">
            <div class="position-relative">
              <img src="https://i.pinimg.com/236x/96/32/7a/96327a2076ece77ee29261f3e458f5d6.jpg" class="card-img-top product-img" alt="Senar Pancing">
            </div>
            <div class="card-body">
              <h5 class="card-title">Senar Pancing Nilon</h5>
              <p class="card-text">Senar pancing kuat dengan diameter 0.25mm hingga 2.00mm, panjang 150m hingga 500m, tahan abrasi serta daya tahan kuat.</p>
              <div class="d-flex justify-content-between align-items-center">
                <span class="price">Rp150.000</span>
                <form method="POST" action="{{ route('cart.add') }}">
                  @csrf
                  <input type="hidden" name="name" value="Senar Pancing Nilon">
                  <input type="hidden" name="price" value="150000">
                  <input type="hidden" name="quantity" value="1">
                  <button type="submit" class="btn btn-fishing btn-sm">
                    <i class="fas fa-cart-plus"></i> Tambah
                  </button>
                </form>
              </div>
            </div>
          </div>
        </div>

        <!-- Product 4 -->
        <div class="col-md-6 col-lg-3">
          <div class="product-card h-100">
            <div class="position-relative">
              <img src="https://i.pinimg.com/236x/b9/d5/5e/b9d55e5a2c12654386e6ac46ba58f24c.jpg" class="card-img-top product-img" alt="Joran Pancing">
              <span class="badge-discount">TERLARIS</span>
            </div>
            <div class="card-body">
              <h5 class="card-title">Joran Pancing Carbon</h5>
              <p class="card-text">Joran carbon 2 piece, panjang 180cm, action medium, ring guide keramik memiliki kekuatan hingga 10 sampai 20 lb.</p>
              <div class="d-flex justify-content-between align-items-center">
                <span class="price">Rp1.500.000</span>
                <form method="POST" action="{{ route('cart.add') }}">
                  @csrf
                  <input type="hidden" name="name" value="Joran Pancing Carbon">
                  <input type="hidden" name="price" value="1500000">
                  <input type="hidden" name="quantity" value="1">
                  <button type="submit" class="btn btn-fishing btn-sm">
                    <i class="fas fa-cart-plus"></i> Tambah
                  </button>
                </form>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
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
    
    .navbar {
      background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
      box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }
    
    .product-card {
      transition: all 0.3s ease;
      border: none;
      border-radius: 10px;
      overflow: hidden;
      box-shadow: 0 5px 15px rgba(209, 18, 18, 0.1);
      margin-bottom: 20px;
    }
    
    .product-img {
      height: 200px;
      object-fit: cover;
    }
    
    .price {
      color: var(--primary-color);
      font-weight: bold;
      font-size: 1.2rem;
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
              <span id="cartCount" class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">0</span>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Hero Section -->
  <section class="hero-section">
    <div class="container">
      <h1 class="display-4 fw-bold mb-4">Toko Alat Pancing Terlengkap</h1>
    </div>
  </section>

  <!-- Product Section -->
<section id="produk" class="py-5">
  <div class="container">
    <h2 class="text-center mb-5">Produk Unggulan Kami</h2>
    <div class="row">

      <!-- Product 1 -->
      <div class="col-md-6 col-lg-3">
        <div class="product-card h-100">
          <div class="position-relative">
            <img src="https://i.pinimg.com/236x/5c/64/8c/5c648c101549466ddc9587fd9746964e.jpg" class="card-img-top product-img" alt="Reel Pancing">
            <span class="badge badge-discount">DISKON 20%</span>
          </div>
          <div class="card-body">
            <a href="#" class="text-decoration-none text-dark">Reel Pancing Shimano</a>
            <p class="card-text">Reel pancing berkualitas tinggi dengan sistem drag halus dan konstruksi kokoh.</p>
            <div class="d-flex justify-content-between align-items-center">
              <span class="price">Rp800.000</span>
              <form method="POST" action="{{ route('cart.add') }}">
                @csrf
                <input type="hidden" name="name" value="Reel Pancing Shimano">
                <input type="hidden" name="price" value="800000">
                <input type="hidden" name="quantity" value="1">
                <button type="submit" class="btn btn-sm btn-fishing">
                  <i class="fas fa-cart-plus"></i>
                </button>
              </form>
            </div>
          </div>
        </div>
      </div>

      <!-- Product 2 -->
      <div class="col-md-6 col-lg-3">
        <div class="product-card h-100">
          <img src="https://i.pinimg.com/236x/32/33/cf/3233cf5f9b4fcc63c74ce3d2125ffbfb.jpg" class="card-img-top product-img" alt="Umpan Buatan">
          <div class="card-body">
            <a href="#" class="text-decoration-none text-dark">Umpan Buatan Berkualitas</a>
            <p class="card-text">Set Umpan buatan berbagai warna dan ukuran untuk semua jenis ikan.</p>
            <div class="d-flex justify-content-between align-items-center">
              <span class="price">Rp200.000</span>
              <form method="POST" action="{{ route('cart.add') }}">
                @csrf
                <input type="hidden" name="name" value="Umpan Buatan Berkualitas">
                <input type="hidden" name="price" value="200000">
                <input type="hidden" name="quantity" value="1">
                <button type="submit" class="btn btn-sm btn-fishing">
                  <i class="fas fa-cart-plus"></i>
                </button>
              </form>
            </div>
          </div>
        </div>
      </div>

      <!-- Product 3 -->
      <div class="col-md-6 col-lg-3">
        <div class="product-card h-100">
          <img src="https://i.pinimg.com/236x/96/32/7a/96327a2076ece77ee29261f3e458f5d6.jpg" class="card-img-top product-img" alt="Senar Pancing">
          <div class="card-body">
            <a href="#" class="text-decoration-none text-dark">Senar Pancing Nilon</a>
            <p class="card-text">Senar pancing kuat dengan diameter 0.25mm, panjang 150m, tahan abrasi.</p>
            <div class="d-flex justify-content-between align-items-center">
              <span class="price">Rp150.000</span>
              <form method="POST" action="{{ route('cart.add') }}">
                @csrf
                <input type="hidden" name="name" value="Senar Pancing Nilon">
                <input type="hidden" name="price" value="150000">
                <input type="hidden" name="quantity" value="1">
                <button type="submit" class="btn btn-sm btn-fishing">
                  <i class="fas fa-cart-plus"></i>
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
            <span class="badge badge-discount">TERLARIS</span>
          </div>
          <div class="card-body">
            <a href="#" class="text-decoration-none text-dark">Joran Pancing Carbon</a>
            <p class="card-text">Joran carbon 2 piece, panjang 180cm, action medium, ring guide keramik.</p>
            <div class="d-flex justify-content-between align-items-center">
              <span class="price">Rp1.500.000</span>
              <form method="POST" action="{{ route('cart.add') }}">
                @csrf
                <input type="hidden" name="name" value="Joran Pancing Carbon">
                <input type="hidden" name="price" value="1500000">
                <input type="hidden" name="quantity" value="1">
                <button type="submit" class="btn btn-sm btn-fishing">
                  <i class="fas fa-cart-plus"></i>
                </button>
              </form>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>

  <!-- TambahKeranjang Script -->
  <script>
    function tambahKeranjang(namaProduk, hargaProduk, imageUrl = '') {
      let cart = JSON.parse(localStorage.getItem('cart')) || [];

      let existingItem = cart.find(item => item.name === namaProduk);
      if (existingItem) {
        existingItem.quantity += 1;
      } else {
        cart.push({
          name: namaProduk,
          price: hargaProduk,
          quantity: 1,
          image: imageUrl
        });
      }

      localStorage.setItem('cart', JSON.stringify(cart));
      window.location.href = "/keranjang";
    }
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>


</body>
</html>
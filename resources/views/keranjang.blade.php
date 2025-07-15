<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Keranjang Belanja - FAJAR FISHING</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
  <style>
    :root {
      --primary-color: #1a6fc9;
      --secondary-color: #0d4b8a;
    }
    .navbar {
      background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
      box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }
    .btn-fishing {
      background-color: var(--primary-color);
      color: white;
    }
    .btn-fishing:hover {
      background-color: var(--secondary-color);
    }
    .cart-item {
      border-radius: 10px;
      box-shadow: 0 2px 10px rgba(0,0,0,0.1);
      margin-bottom: 15px;
      padding: 15px;
    }
    .total-section {
      background-color: #f8f9fa;
      border-radius: 10px;
      padding: 20px;
      box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }
    .empty-cart {
      text-align: center;
      padding: 50px 0;
    }
    .empty-cart i {
      font-size: 5rem;
      color: #ccc;
      margin-bottom: 20px;
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
          <li class="nav-item">
            <a class="nav-link active position-relative" href="/keranjang">
              <i class="fas fa-shopping-cart"></i>
              <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">0</span>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Keranjang Belanja Section -->
  <section class="py-5">
    <div class="container">
      <h2 class="mb-4"><i class="fas fa-shopping-cart me-2"></i>Keranjang Belanja</h2>

      <!-- Notifikasi -->
      @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          {{ session('success') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
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

      @if (count($cart) > 0)
        <div class="row">
          <div class="col-lg-8">
            @foreach ($cart as $index => $item)
              <div class="cart-item">
                <div class="d-flex justify-content-between">
                  <div>
                    <strong>{{ $item['name'] }}</strong><br/>
                    Qty: {{ $item['quantity'] }}
                  </div>
                  <div>
                    Rp{{ number_format($item['price'] * $item['quantity'], 0, ',', '.') }}
                  </div>
                </div>
                <form method="POST" action="{{ route('cart.remove', $index) }}" class="mt-2">
                  @csrf
                  <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                </form>
              </div>
            @endforeach
          </div>

          <div class="col-lg-4">
            <div class="total-section">
              <h4 class="mb-4">Ringkasan Belanja</h4>
              <div class="d-flex justify-content-between mb-2">
                <span>Total Harga:</span>
                <span>Rp{{ number_format($total, 0, ',', '.') }}</span>
              </div>
              <hr>
              <!-- Form Checkout Lengkap -->
              <form action="{{ route('cart.checkout') }}" method="POST">
                @csrf
                <div class="mb-3">
                  <label for="nama" class="form-label">Nama Lengkap</label>
                  <input type="text" class="form-control" name="nama" id="nama" required>
                </div>

                <div class="mb-3">
                  <label for="telepon" class="form-label">Nomor Telepon</label>
                  <input type="text" class="form-control" name="telepon" id="telepon" required>
                </div>

                <div class="mb-3">
                  <label for="alamat" class="form-label">Alamat Lengkap</label>
                  <textarea class="form-control" name="alamat" id="alamat" rows="2" required></textarea>
                </div>

                <div class="mb-3">
                  <label for="metode_pembayaran" class="form-label">Metode Pembayaran</label>
                  <select class="form-select" name="metode_pembayaran" id="metode_pembayaran" required>
                    <option value="">-- Pilih Metode --</option>
                    <option value="Transfer Bank">Transfer Bank/BANK BTN A/N FAJAR 241016-1021-4534</option>
                    <option value="COD (Bayar di Tempat)">COD (Bayar di Tempat)</option>
                    <option value="E-Wallet (Dana, OVO, Gopay)">E-Wallet (Dana, OVO, Gopay)FAJAR/085710480831</option>
                  </select>
                </div>

                <button type="submit" class="btn btn-fishing w-100 mb-2">
                  <i class="fas fa-credit-card me-2"></i>Proses Pembayaran
                </button>
              </form>

              <a href="/#produk" class="btn btn-outline-secondary w-100">
                <i class="fas fa-arrow-left me-2"></i>Lanjutkan Belanja
              </a>
            </div>
          </div>
        </div>
      @else
        <div class="empty-cart">
          <i class="fas fa-fish"></i>
          <h3>Keranjang Belanja Kosong</h3>
          <p class="text-muted">Anda belum menambahkan produk ke keranjang</p>
          <a href="/#produk" class="nav-link">Lanjutkan Belanja</a>
        </div>
      @endif
    </div>
  </section>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

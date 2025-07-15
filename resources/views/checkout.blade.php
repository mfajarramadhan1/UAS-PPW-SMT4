<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Checkout - FAJAR FISHING</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
  <style>
    :root {
      --primary-color: #1a6fc9;
      --secondary-color: #0d4b8a;
    }

    .navbar {
      background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
    }

    .btn-fishing {
      background-color: var(--primary-color);
      color: #fff;
    }

    .btn-fishing:hover {
      background-color: var(--secondary-color);
    }

    .summary-box {
      background: #f8f9fa;
      padding: 20px;
      border-radius: 12px;
      box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }
  </style>
</head>
<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
      <a class="navbar-brand" href="/">
        <i class="fas fa-fish me-2"></i>FAJAR FISHING
      </a>
    </div>
  </nav>

  <!-- Checkout Section -->
  <section class="py-5">
    <div class="container">
      <h2 class="mb-4"><i class="fas fa-credit-card me-2"></i>Checkout</h2>
      <div class="row">
        <!-- Form Pembeli -->
        <div class="col-md-6">
          <form method="POST" action="{{ route('checkout.store') }}">
            @csrf
            <div class="mb-3">
              <label for="nama" class="form-label">Nama Lengkap</label>
              <input type="text" class="form-control" id="nama" name="nama" required>
            </div>
            <div class="mb-3">
              <label for="telepon" class="form-label">Nomor Telepon</label>
              <input type="tel" class="form-control" id="telepon" name="telepon" required>
            </div>
            <div class="mb-3">
              <label for="alamat" class="form-label">Alamat Pengiriman</label>
              <textarea class="form-control" id="alamat" name="alamat" rows="3" required></textarea>
            </div>

            <!-- Metode Pembayaran -->
            <div class="mb-3">
              <label for="metode_pembayaran" class="form-label">Metode Pembayaran</label>
              <select class="form-select" id="metode_pembayaran" name="metode_pembayaran" required>
                <option value="">-- Pilih Metode --</option>
                <option value="Transfer Bank">Transfer Bank(Bank BTN.1021 4534 A/N fajar ramadhan)</option>
                <option value="COD (Bayar di Tempat)">COD (Bayar di Tempat)</option>
                <option value="E-Wallet (Dana, OVO, Gopay)">E-Wallet (Dana, OVO, Gopay/085710480831 A/N fajar)</option>
              </select>
            </div>

            <button type="submit" class="btn btn-fishing w-100">
              <i class="fas fa-paper-plane me-2"></i>Konfirmasi & Bayar
            </button>
          </form>
        </div>

        <!-- Ringkasan Belanja -->
        <div class="col-md-6">
          <div class="summary-box">
            <h5>Ringkasan Belanja</h5>
            @if(count($cart) > 0)
              <ul class="list-group mb-3">
                @foreach ($cart as $item)
                  <li class="list-group-item d-flex justify-content-between align-items-center">
                    <div>{{ $item['name'] }} x {{ $item['quantity'] }}</div>
                    <span>Rp{{ number_format($item['price'] * $item['quantity'], 0, ',', '.') }}</span>
                  </li>
                @endforeach
              </ul>
              <div class="d-flex justify-content-between">
                <strong>Total:</strong>
                <strong>Rp{{ number_format($total, 0, ',', '.') }}</strong>
              </div>
            @else
              <p class="text-muted">Keranjang kosong.</p>
            @endif
          </div>
        </div>
      </div>
    </div>
  </section>
</body>
</html>

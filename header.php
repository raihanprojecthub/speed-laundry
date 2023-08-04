  <?php
  // Memulai sesi dan menyimpan informasi login
  session_start();

  // Inisialisasi pesan error menjadi string kosong
  $error_message = "";

  // Periksa apakah ada data yang dikirim melalui method POST
  if ($_SERVER["REQUEST_METHOD"] === "POST") {
      // Ambil data dari form login
      $username = $_POST["username"];
      $password = $_POST["password"];

      // Baca data dari file JSON
      $json_data = file_get_contents("data/login.json");
      $data = json_decode($json_data, true);

      // Cek apakah username dan password cocok dengan data di JSON
      $matched = false;
      foreach ($data["users"] as $user) {
          if ($user["username"] === $username && $user["password"] === $password) {
              // Jika cocok, simpan username ke session
              $_SESSION["username"] = $username;

              // Redirect ke halaman admin.php
              header("Location: admin/admin.php");
              exit();
          }
      }

      // Jika username atau password salah, set pesan error
      $error_message = "Username atau password salah.";
  }
  ?>
  
  <!-- Popup login Start -->
  <div class="modal fade" id="modal-login" tabindex="-1" aria-labelledby="modalLoginLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-container">
      <div class="modal-content">
        <!-- Header Popup -->
        <div class="modal-header">
          <h1 class="modal-title fs-5 fw-bold" id="modalLoginLabel">Login Admin</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="" method="post">
            <!-- Input type teks memasukan username -->
            <div class="form-group mb-3">
              <label for="username" class="text-secondary mb-2 fw-medium">Username *</label>
              <input type="username" name="username" id="username" class="form-control" placeholder="Masukan Username Anda" required>
            </div>
            <!-- Input type password memasukan password -->
            <div class="form-group mb-3">
              <label for="password" class="text-secondary mb-2 fw-medium">Password *</label>
              <input type="password" name="password" id="password" class="form-control" placeholder="Masukan Password Anda"
                required>
              <!-- Tampilkan pesan error jika ada -->
              <?php if (!empty($error_message)) : ?>
                  <script>
                      alert("<?php echo $error_message; ?>");
                  </script>
              <?php endif; ?>
            </div>
            <button type="submit" class="btn btn-primary"> <i class="fa fa-sign-in" value="Login"></i> Login / Masuk </button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- Popup login End -->

  <!-- Navbar Start -->
  <nav class="navbar navbar-expand-lg bg-primary fixed-top">
    <div class="container">
      <!-- Logo dan judul halaman -->
      <a class="navbar-brand fs-4 fw-bold fst-italic text-white" href="#"><i class="fa-solid fa-bolt me-1"></i>speedlaundry</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto gap-2">
          <!-- Navigasi Home -->
          <li class="nav-item">
            <a class="nav-link fs-5 text-white" href="index.php">Home</a>
          </li>
          <!-- Navigasi Pemesanan -->
          <li class="nav-item">
            <a class="nav-link fs-5 text-white" href="pemesanan.php">Pemesanan</a>
          </li>
          <!-- Navigasi Riwayat -->
          <li class="nav-item">
            <a class="nav-link fs-5 text-white" href="riwayat.php">Riwayat</a>
          </li>
          <!-- Navigasi Login -->
          <li class="nav-item">
            <a class="nav-link fs-5 text-white" data-bs-toggle="modal" data-bs-target="#modal-login" href="admin/index.php">Login</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- Navbar End -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Speed Laundry</title>
  <!-- Font Awesome Icon -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- CSS Bootstrap -->
  <link rel="stylesheet" href="../library/css/bootstrap.min.css">
  <!-- My CSS -->
  <link rel="stylesheet" href="../library/css/style.css">
</head>
<body>
  <?php
    // Mengambil id nomor dari file index.php
    $id = $_GET['nomor'];

    // Mengambil dari data JSON
    $dataLaundry = file_get_contents('../data/data.json');
    $dataJson = json_decode($dataLaundry);

    // Mengubah id data JSON menjadi row
    $row = $dataJson[$id];

    // Periksa apakah ada data yang diubah melalui method POST
    if(isset($_POST['simpan'])){
      // Baca data dari inputan form
      $nama = $_POST['nama'];
      $no_telepon = $_POST['no_telepon'];
      $paket = $_POST['paket'];
      $berat= $_POST['berat'];
      $harga_paket = $_POST['harga_paket'];
      $total_harga = $_POST['total_harga'];
      $alamat = $_POST['alamat'];

    // Harga Paket Cuci dalam bentuk array
    $harga_paket_cuci = array(
      "Cuci Reguler" => 1000,
      "Cuci Kilat" => 2000,
      "Cuci Express" => 4000,
    );

    // Perhitungan Harga Laundry
    $harga_laundry = 8000 * $berat;

    // Perhitungan Harga Paket
    $harga_paket = $harga_paket_cuci[$paket] * $berat;

    // Perhitungan Total Harga
    $total_harga= $harga_laundry + $harga_paket;
  
    // Membuat array data Laundry
    $dataLaundry = [
      'nama' => $nama,
      'no_telepon' => $no_telepon,
      'paket' => $paket,
      'berat' => $berat,
      'harga_paket' => $harga_paket,
      'total_harga' => $total_harga,
      'alamat' => $alamat,
    ];
    
    // Membaca data JSON yang sudah ada
    $jsonData = file_get_contents('../data/data.json');
    $dataJson = json_decode($jsonData, true);

    // Menambahkan data baru ke array data JSON
    $dataJson[$id] = $dataLaundry;

    // Mengubah data menjadi format JSON
    $newJsonData = json_encode($dataJson, JSON_PRETTY_PRINT);

    // Menyimpan data ke file JSON
    file_put_contents('../data/data.json', $newJsonData);

    // Mengarahkan pengguna kembali ke halaman utama
    header('location: admin.php');
    }

  ?>

  <!-- Mengambil file header.php menggunakan php include -->
  <?php include"header.php"; ?>

  <!-- Ubah Section Start -->
  <section id="ubah" class="d-flex justify-content-center align-items-center">
    <div class="container border shadow p-5 bg-body-tertiary rounded">
      <!-- Header Halaman -->
      <div class="text-center mb-5">
        <h1 class="fs-2">Ubah Pesanan Laundry</h1>
      </div>
      <!-- Form pemesanan laundry dengan method post -->
      <form method="post">
        <div class="d-flex gap-3">
          <div class="w-100">
            <div class="mb-3">
              <!-- Input type text memasukan nama pelanggan -->
              <label for="nama" class="form-label">Nama Pelanggan</label>
              <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukan Nama Pelanggan" value="<?php echo $row->nama; ?>" required>
            </div>
            <div class="mb-3">
              <!-- Input type text memasukan nomor telepon -->
              <label for="no_telepon" class="form-label">Nomor Telepon</label>
              <input type="text" class="form-control" name="no_telepon" id="no_telepon" placeholder="Masukan Nomor Telepon" value="<?php echo $row->no_telepon; ?>" required>
            </div>
          </div>
          <div class="w-100">
            <div class="mb-3">
              <!-- Select daftar paket cuci -->
              <label for="paket" class="form-label">Pilih Paket</label>
              <select class="form-select" name="paket" id="paket" required>
                <option value="<?php echo $row->paket; ?>"><?php echo $row->paket; ?></option>
                <option value="Cuci Reguler">Cuci Reguler</option>
                <option value="Cuci Kilat">Cuci Kilat</option>
                <option value="Cuci Express">Cuci Express</option>
              </select>
            </div>
            <div class="mb-3">
              <!-- Input type number memasukan berat cucian -->
              <label for="berat" class="form-label">Berat (Kg)</label>
              <input type="number" class="form-control" name="berat" id="berat" placeholder="Masukan Berat (Kg)" value="<?php echo $row->berat; ?>" required>
            </div>
            <!-- Textarea alamat pelanggan -->
            <div class="mb-4">
              <label for="alamat" class="form-label">Alamat</label>
              <textarea class="form-control" name="alamat" placeholder="Masukan Alamat Pelanggan" id="alamat" style="height: 100px" required><?php echo $row->alamat; ?></textarea>
            </div>
          </div>
        </div>
        <div class="d-flex gap-1">
          <!-- Tombol kembali ke index.php dan button simpan -->
          <a href="admin.php" class="btn btn-danger w-100">Kembali</a>
          <button type="submit" name="simpan" class="btn btn-primary w-100">Simpan</button>
        </div>
      </form>
    </div>
  </section>
  <!-- Ubah Section End -->

  <!-- Footer Start -->
  <footer class="bg-primary p-3 fixed-bottom">
    <h1 class="text-center fs-6 text-white">© 2023 Raihan Ramadhan. All rights reserved.</h1>
  </footer>
  <!-- Footer End -->
  
  <!-- JS Bootsrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>
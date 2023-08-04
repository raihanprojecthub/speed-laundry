<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Speed Laundry</title>
  <!-- Font Awesome Icon -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- CSS Bootstrap -->
  <link rel="stylesheet" href="library/css/bootstrap.min.css">
  <!-- My CSS -->
  <link rel="stylesheet" href="library/css/style.css">
</head>
<body>
  <?php
    // Mengambil id nomor dari file index.php
    $id = $_GET['nomor'];

    // Mengambil dari data JSON
    $dataLaundry = file_get_contents('data/data.json');
    $dataJson = json_decode($dataLaundry);

    // Mengubah id data JSON menjadi row
    $row = $dataJson[$id];
  ?>

  <!-- Mengambil file header.php menggunakan php include -->
  <?php include"header.php"; ?>

  <!-- Detail Section Start -->
  <section id="detail" class="d-flex justify-content-center align-items-center">
    <div class="container border shadow p-5 mb-5 bg-body-tertiary rounded">
      <div class="text-center mb-4">
        <h1 class="fs-2">Detail Pemesanan</h1>
      </div>
      <!-- Table Costumer -->
      <table class="table table-responsive table-light table-bordered table-hover border mb-4">
        <tr class="table-dark">
          <td colspan="2" class="fw-bold text-white">Costumer</td>
        </tr>
        <tr>
          <!-- Mencetak nama -->
          <td class="fw-bold">Nama</td>
          <td><?php echo $row->nama; ?></td>
        </tr>
        <tr>
          <!-- Mencetak nomor telepon -->
          <td class="fw-bold">Nomor Telepon</td>
          <td><?php echo $row->no_telepon; ?></td>
        </tr>
        <tr>
          <!-- Mencetak alamat -->
          <td class="fw-bold">Alamat</td>
          <td><?php echo $row->alamat; ?></td>
        </tr>
        <tr>
          <!-- Mencetak jenis paket -->
          <td class="fw-bold">Jenis Paket</td>
          <td><?php echo $row->paket; ?></td>
        </tr>
      </table>

      <!-- Table Order -->
      <table class="table table-responsive table-light table-bordered table-hover border mb-4">
        <tr class="table-dark">
          <td colspan="4" class="fw-bold text-white">Order</td>
        </tr>
        <!-- Mencetak order -->
        <tr class="">
          <td class="fw-bold">Berat (Kg)</td>
          <td class="fw-bold">Harga Per-Kg</td>
          <td class="fw-bold">Harga Paket</td>
          <td class="fw-bold">Total Bayar</td>
        </tr>
        <tr>
          <td><?php echo $row->berat; ?> Kg</td>
          <td>Rp. 8000</td>
          <td>Rp. <?php echo $row->harga_paket; ?></td>
          <td>Rp. <?php echo $row->total_harga; ?></td>
        </tr>
        <tr>
      </table>
      <div class="d-flex gap-1">
        <!-- Tombol kembali ke index.php dan button simpan -->
        <a href="riwayat.php" class="btn btn-danger w-100">Kembali</a>
        <?php 
          echo "
            <a href='cetak.php?nomor=".$id."' class='btn btn-warning w-100' target='_blank'>Cetak</a>
          ";
        ?>
      </div>
    </div>
  </section>
  <!-- Detail Section End -->

  <!-- Footer Start -->
  <footer class="bg-primary p-3 fixed-bottom">
    <h1 class="text-center fs-6 text-white">© 2023 Raihan Ramadhan. All rights reserved.</h1>
  </footer>
  <!-- Footer End -->
  
  <!-- JS Bootsrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>
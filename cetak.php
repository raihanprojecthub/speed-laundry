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
  <style>
    #cetak {
      min-height: 100vh;
    }
  </style>
</head>
<body onload="window.print();" Layout="Portrait">
  <?php
    // Mengambil id nomor dari file index.php
    $id = $_GET['nomor'];

    // Mengambil dari data JSON
    $dataLaundry = file_get_contents('data/data.json');
    $dataJson = json_decode($dataLaundry);

    // Mengubah id data JSON menjadi row
    $row = $dataJson[$id];
  ?>

  <!-- Cetak Section Start -->
  <section id="cetak" class="d-flex justify-content-center align-items-center">
    <div class="border bg-white">
      <div class="text-center mb-4 border" style="padding: 10px 120px;">
        <img src="img/logo.png" alt="Logo" width="250px">
      </div>
      <h1 class="fw-bold fs-6 text-center">Bukti Transaksi</h1>
      <div class="ps-2">
        <table class="table table-borderless mb-4">
          <tr>
            <td class="fw-bold">Nama Pelanggan</td>
            <td>: <?php echo $row->nama; ?></td>
          </tr>
          <tr>
            <td class="fw-bold">Nomor Telepon</td>
            <td>: <?php echo $row->no_telepon; ?></td>
          </tr>
          <tr>
            <td class="fw-bold">Alamat</td>
            <td>: <?php echo $row->alamat; ?></td>
          </tr>
        </table>
      </div>
      <div class="px-3">
        <table class="table border mb-4">
          <tr>
            <td class="fw-bold">Jenis Paket</td>
            <td class="fw-bold">Berat (Kg)</td>
            <td class="fw-bold">Harga Per-Kg</td>
          </tr>
          <tr>
            <td><?php echo $row->paket; ?></td>
            <td><?php echo $row->berat; ?> Kg</td>
            <td>Rp. 8000 x <?php echo $row->berat; ?></td>
          </tr>
          <tr class="table-secondary">
            <td colspan="2" class="fw-bold" style="text-align: right;">Harga Paket</td>
            <td class="table-active"><?php echo $row->harga_paket; ?></td>
          </tr>
          <tr class="table-secondary">
            <td colspan="2" class="fw-bold" style="text-align: right;">Total Bayar</td>
            <td class="table-active"><?php echo $row->total_harga; ?></td>
          </tr>
        </table>
      </div>
    </div>
  </section>
  <!-- Cetak Section End -->
  
  <!-- JS Bootsrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>
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
  <!-- Mengambil file header.php menggunakan php include -->
  <?php include"header.php"; ?>

  <!-- Riwayat Section Start -->
  <section id="riwayat" class="d-flex justify-content-center align-items-center">
    <div class="container border shadow p-5 bg-body-tertiary rounded">
      <!-- Header Halaman -->
      <div class="text-center mb-5">
        <h1 class="fs-2">Riwayat Laundry</h1>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <!-- Tabel data pesanan laundry -->
          <table class="table table-responsive table-light table-bordered table-striped table-hover text-center border">
            <!-- Tabel Header -->
            <thead>
              <th>No</th>
              <th>Nama Pelanggan</th>
              <th>Jenis Paket</th>
              <th>Berat</th>
              <th>Harga Paket</th>
              <th>Total Harga</th>
              <th>Aksi</th>
            </thead>
            <!-- Tabel Body -->
            <tbody>
              <?php 
                $file = "data/data.json";
                // Mengambil data dari data.json
                $dataJSON = file_get_contents($file);
                // Decode data json kedalam data array php
                $dataLaundry = json_decode($dataJSON, true);

                // Varibel id dimulai dari angka 0
                $id = 0;
                // Varibel nomor dimulai dari angka 1
                $nomor = 1;
                // Mencetak data Laundry dengan menggunakan foreach
                foreach($dataLaundry as $hasil){
                  echo "
                    <tr>
                      <td>".$nomor++."</td>
                      <td>".$hasil['nama']."</td>
                      <td>".$hasil['paket']."</td>
                      <td>".$hasil['berat']."</td>
                      <td>".$hasil['harga_paket']."</td>
                      <td>".$hasil['total_harga']."</td>
                      <td>
                        <a href='detail.php?nomor=".$id."' class='btn btn-warning btn-sm'>Detail</a>
                        <a onclick='return confirm(\"Apakah Anda yakin ingin menghapus data ini?\")' 
                        href='hapus.php?index=".$id."' class='btn btn-danger btn-sm'>Hapus</a>
                      </td>
                    </tr>
                  ";
                  // Variabel id bertambah 1 setiap data yang masuk
                  $id++;
                }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </section>
  <!-- Riwayat Section End -->

  <!-- Footer Start -->
  <footer class="bg-primary p-3 fixed-bottom">
    <h1 class="text-center fs-6 text-white">© 2023 Raihan Ramadhan. All rights reserved.</h1>
  </footer>
  <!-- Footer End -->
  
  <!-- JS Bootsrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>
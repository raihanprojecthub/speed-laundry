<?php
    // Mengambil id dari file index.php
    $id = $_GET['index'];
 
    // Mengambil dari data JSON
    $dataLaundry = file_get_contents('data/data.json');
    $dataLaundry = json_decode($dataLaundry);
 
    // Menghapus data sesuai index JSON
    unset($dataLaundry[$id]);
 
    // Mengubah data menjadi format JSON
    $dataLaundry = json_encode($dataLaundry, JSON_PRETTY_PRINT);
    file_put_contents('data/data.json', $dataLaundry);
 
    // Mengarahkan pengguna ke halaman utama
    header('location: riwayat.php');
?>
<?php 
session_start();
 
// cek apakah yang mengakses halaman ini sudah login
if($_SESSION['level']==""){
    header("location:index.php?pesan=gagal");
}

require 'functions.php';
$peserta = query("SELECT * FROM peserta");

// tombol cari ditekan
if( isset($_POST["cari"]) ) {
    $peserta = cari($_POST["keyword"]);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Halaman Peserta</title>
    <link rel="stylesheet" type="text/css" href="style2.css">
    <!-- Tambahkan link FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>

<h1>Daftar Peserta</h1>
<center>
    <br>
    <table border="1" cellpadding="10" width="100%">
        <tr>
            <th>No.</th>
            <th>NIK</th>
            <th>Nama</th>
            <th>Email</th>
            <th>No Hp</th>
            <th>Jenis Kelamin</th>
            <th>Tanggal Lahir</th>
            <th>Alamat</th>
            <th>Posisi</th>
            <th>Gambar</th>
        </tr>
        <?php $i = 1; ?>
        <?php foreach( $peserta as $row ) : ?>
        <tr>
            <td><?= $i; ?></td>
            <td><?= $row["nik"]; ?></td>
            <td><?= $row["nama"]; ?></td>
            <td><?= $row["email"]; ?></td>
            <td><?= $row["nohp"]; ?></td>
            <td><?= $row["jeniskelamin"]; ?></td>
            <td><?= $row["tanggallahir"]; ?></td>
            <td><?= $row["alamat"]; ?></td>
            <td><?= $row["posisi"]; ?></td>
            <td><img src="img/<?= $row["gambar"]; ?>" width="50"></td>
        </tr>
        <?php $i++; ?>
        <?php endforeach; ?>
    </table>
</center>
<script>
    window.print();
</script>
</body>
</html>

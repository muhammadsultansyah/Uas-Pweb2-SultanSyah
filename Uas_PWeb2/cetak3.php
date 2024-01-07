<?php 
session_start();
 
// cek apakah yang mengakses halaman ini sudah login
if($_SESSION['level']==""){
    header("location:index.php?pesan=gagal");
}

require 'functions2.php';
$jadwal = query("SELECT * FROM jadwal");

// tombol cari ditekan
if( isset($_POST["cari"]) ) {
    $jadwal = cari($_POST["keyword"]);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Halaman Jadwal Pertandingan</title>
    <link rel="stylesheet" type="text/css" href="style2.css">
    <!-- Tambahkan link FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>

<h1>Daftar Jadwal Pertandingan</h1>
<center>
    <br>
    <table border="1" cellpadding="10" width="100%">
        <tr>
            <th>No.</th>
            <th>Tim</th>
            <th>Tanggal Pertandingan</th>
            <th>Jam</th>
            <th>Icon</th>  
        </tr>
        <?php $i = 1; ?>
        <?php foreach( $jadwal as $row ) : ?>
        <tr>
            <td><?= $i; ?></td>
            <td><?php echo $row['nama']; ?></td>
            <td><?php echo $row['tanggalpertandingan']; ?></td>
            <td><?php echo $row['jam']; ?></td>
            <td><center><img src="img/<?= $row["gambar"]; ?>" width="100"></center></td>
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

<?php 
session_start();
 
// cek apakah yang mengakses halaman ini sudah login
if($_SESSION['level']==""){
    header("location:index.php?pesan=gagal");
}

require 'functions3.php';
$jadwal = query("SELECT * FROM jadwal");

// tombol cari ditekan
if( isset($_POST["cari"]) ) {
    $jadwal = cari($_POST["keyword"]);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ade Tiara</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <link rel="stylesheet" href="styles.css">
</head>
<style type="text/css">
  /* Add your custom styles here */
body {
  padding-top: 20px; /* Adjust based on the height of your navbar */
}

footer {
  position: fixed;
  bottom: 0;
  width: 100%;
}
th {
        background-color: lightgreen;
        color: black;
        padding: 10px;
        text-align: left;
        text-shadow: 1px 1px 1px #fff;
        text-decoration: none;
}

</style>
<body>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <a class="navbar-brand" href="logout.php">Logout</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
          <a class="nav-link" href="halaman_pemilik.php">Beranda</a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="tim3.php">Tim</a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="jadwal3.php">Jadwal Pertandingan</a>
        </li>
      </ul>
    </div>
  </nav>

  <!-- Content -->
  <div class="container mt-4">
    <h1>Daftar jadwal</h1>
<center>
  <!-- Tambahkan ikon tambah -->
    <form action="" method="post">
        <input type="text" name="keyword" size="40" autofocus placeholder="Masukkan keyword pencarian.." autocomplete="off">
        <button type="submit" name="cari" class="btn btn-primary"><i class="fas fa-search"></i> Cari!</button> 
    </form>
    <br/>
    <table class="table table-bordered table-hover">
        <thead class="thead-light">
            <tr>
                <th>No.</th>
                <th>Tim</th>
                <th>Tanggal Pertandingan</th>
                <th>Jam</th>
                <th>Icon</th>
            </tr>
        </thead>
        <tbody>
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
        </tbody>
    </table>
    <p><a href="cetak3.php" target="_blank" class="btn btn-primary">CETAK</a>
      <a href="unduh3.php" class="btn btn-primary">UNDUH</a></p>
  </div>
    <br/>
  <br/>
</br>

  <!-- Footer -->
  <footer class="bg-dark text-white text-center py-3">
    <p>&copy; 2023 Ade Tiara </p>
  </footer>

  <!-- Scripts -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>

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
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sulthan</title>
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
          <a class="nav-link" href="halaman_admin.php">Beranda</a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="tim2.php">Tim</a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="jadwal2.php">Jadwal Pertandingan</a>
        </li>
      </ul>
    </div>
  </nav>

  <!-- Content -->
  <div class="container mt-4">
    <h1>Daftar peserta</h1>
<center>
  <!-- Tambahkan ikon tambah -->
    <a href="tambah.php" class="btn btn-success"><i class="fas fa-plus-square"></i> Tambah data peserta</a>
    <br><br>
    <form action="" method="post">
        <input type="text" name="keyword" size="40" autofocus placeholder="Masukkan keyword pencarian.." autocomplete="off">
        <button type="submit" name="cari" class="btn btn-primary"><i class="fas fa-search"></i> Cari!</button> 
    </form>
    <br/>
    <table class="table table-bordered table-hover">
        <thead class="thead-light">
            <tr>
                <th>No.</th>
                <th width="95px">Aksi</th>
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
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach( $peserta as $row ) : ?>
            <tr>
                <td><?= $i; ?></td>
                <td>
                    <!-- Tambahkan tombol Bootstrap untuk Ubah dan Hapus -->
                    <a href="ubah.php?id=<?= $row["id"]; ?>" class="btn btn-warning"><i class="fas fa-edit"></i> Ubah</a>
                    <p></p>
                    <a href="hapus.php?id=<?= $row["id"]; ?>" class="btn btn-danger" onclick="return confirm('Yakin hapus data?');"><i class="fas fa-trash-alt"></i> Hapus</a>
                </td>
                <td><?= $row["nik"]; ?></td>
                <td><?= $row["nama"]; ?></td>
                <td><?= $row["email"]; ?></td>
                <td><?= $row["nohp"]; ?></td>
                <td><?= $row["jeniskelamin"]; ?></td>
                <td><?= $row["tanggallahir"]; ?></td>
                <td><?= $row["alamat"]; ?></td>
                <td><?= $row["posisi"]; ?></td>
                <td><img src="img/<?= $row["gambar"]; ?>" width="70" height="85"></td>
            </tr>
            <?php $i++; ?>
            <?php endforeach; ?>
        </tbody>
    </table>
  </div>
      </br>
  <br/>
</br>


  <!-- Footer -->
  <footer class="bg-dark text-white text-center py-3">
    <p>&copy; 2023 Sulthan </p>
  </footer>

  <!-- Scripts -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>

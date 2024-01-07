<?php
require 'functions.php';

// ambil data di URL
$id = $_GET["id"];

// query data peserta berdasarkan id
$pg = query("SELECT * FROM peserta WHERE id = $id")[0];


// cek apakah tombol submit sudah ditekan atau belum
if( isset($_POST["submit"]) ) {
	
	// cek apakah data berhasil diubah atau tidak
	if( ubah($_POST) > 0 ) {
		echo "
			<script>
				alert('data berhasil diubah!');
				document.location.href = 'halaman_admin.php';
			</script>
		";
	} else {
		echo "
			<script>
				alert('data gagal diubah!');
				document.location.href = 'halaman_admin.php';
			</script>
		";
	}


}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Ubah data peserta</title>
</head>
<style type="text/css">
      * {
        font-family: "Trebuchet MS";
      }
      body{
      	background-color: lightgreen;
      }
      h1 {
        text-transform: uppercase;
        color: grey;
      }
    button {
          background-color: grey;
          color: #fff;
          padding: 10px;
          text-decoration: none;
          font-size: 12px;
          border: 0px;
          margin-top: 20px;
    }
    label {
      margin-top: 10px;
      float: left;
      text-align: left;
      width: 100%;
    }
    input,select,textarea {
      padding: 6px;
      width: 100%;
      box-sizing: border-box;
      background: #f8f8f8;
      border: 2px solid #ccc;
      outline-color: lightgreen;
    }
    div {
      width: 100%;
      height: auto;
    }
    .base {
      width: 400px;
      height: auto;
      padding: 20px;
      margin-left: auto;
      margin-right: auto;
      background: lightgray;
    }
</style>
<body>
	<center><h1>Ubah data peserta</h1></center>

	<form action="" method="post" enctype="multipart/form-data">
		<section class="base">
		<input type="hidden" name="id" value="<?= $pg["id"]; ?>">
		<input type="hidden" name="gambarLama" value="<?= $pg["gambar"]; ?>">
		
			<div>
				<label for="nik">Nik : </label>
				<input type="text" name="nik" id="nik" required value="<?= $pg["nik"]; ?>">
			</div>
			<div>
				<label for="nama">Nama : </label>
				<input type="text" name="nama" id="nama" value="<?= $pg["nama"]; ?>">
			</div>
			<div>
				<label for="email">Email :</label>
				<input type="text" name="email" id="email" value="<?= $pg["email"]; ?>">
			</div>
			<div>
				<label for="nohp">No hp :</label>
				<input type="text" name="nohp" id="nohp" value="<?= $pg["nohp"]; ?>">
			</div>
			<div>
				<label for="jeniskelamin">Jenis Kelamin</label>
    		<select id="jeniskelamin" name="jeniskelamin" value="<?= $pg["jeniskelamin"]; ?>">
      		<option value="pria">pria</option>
      		<option value="wanita">wanita</option>
    		</select>
			</div>
			<div>
			<label for="tanggallahir">Tanggal Lahir</label>
   		    <input type="date" id="tanggallahir" name="tanggallahir" value="<?= $pg["tanggallahir"]; ?>">
			</div>
			<div>
			<label for="alamat">Alamat:</label>
    		<textarea id="alamat" name="alamat" rows="4" value="<?= $pg["alamat"]; ?>"></textarea>
			</div>
			<div>
				<label for="posisi">Posisi :</label>
		<select id="posisi" name="posisi" value="<?= $ss["posisi"]; ?>">
      <option value="Exp Lane">Exp Lane</option>
      <option value="Mid Lane">Mid Lane</option>
      <option value="Gold Lane">Gold Lane</option>
      <option value="Jungler">Jungler</option>
      <option value="Roamer">Roamer</option>
    </select>
			</div>
			<div>
				<label for="gambar">Gambar :</label> <br>
				<img src="img/<?= $pg['gambar']; ?>" width="50"> <br>
				<input type="file" name="gambar" id="gambar">
			</div>
			<div>
				<button type="submit" name="submit">Ubah Data!</button>
			</div>

	</form>




</body>
</html>

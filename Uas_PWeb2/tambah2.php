<?php
require 'functions2.php';

// cek apakah tombol submit sudah ditekan atau belum
if( isset($_POST["submit"]) ) {
	
	// cek apakah data berhasil di tambahkan atau tidak
	if( tambah($_POST) > 0 ) {
		echo "
			<script>
				alert('data berhasil ditambahkan!');
				document.location.href = 'tim2.php';
			</script>
		";
	} else {
		echo "
			<script>
				alert('data gagal ditambahkan!');
				document.location.href = 'tim2.php';
			</script>
		";
	}


}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Tambah data tim</title>
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
	<center><h1>Tambah data tim</h1></center>

	<form action="" method="post" enctype="multipart/form-data">
		<section class="base">
			<div>
				<label for="nama">Nama : </label>
				<input type="text" name="nama" id="nama" required>
			</div>
			<div>
				<label for="posisi">Posisi :</label>
		<select id="posisi" name="posisi">
      <option value="Exp Lane">Exp Lane</option>
      <option value="Mid Lane">Mid Lane</option>
      <option value="Gold Lane">Gold Lane</option>
      <option value="Jungler">Jungler</option>
      <option value="Roamer">Roamer</option>
    </select>
			</div>
			<div>
				<label for="namatim">Tim :</label>
				<input type="text" name="namatim" id="namatim">
			</div>
			<div>
				<label for="gambar">Gambar :</label>
				<input type="file" name="gambar" id="gambar">
			</div>
			<div>
				<button type="submit" name="submit">Tambah Data!</button>
			</div>
		

	</form>

</body>
</html>

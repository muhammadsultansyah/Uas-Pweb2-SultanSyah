<?php
require 'functions2.php';

// ambil data di URL
$id = $_GET["id"];

// query data tim berdasarkan id
$flo = query("SELECT * FROM tim WHERE id = $id")[0];


// cek apakah tombol submit sudah ditekan atau belum
if( isset($_POST["submit"]) ) {
	
	// cek apakah data berhasil diubah atau tidak
	if( ubah($_POST) > 0 ) {
		echo "
			<script>
				alert('data berhasil diubah!');
				document.location.href = 'tim2.php';
			</script>
		";
	} else {
		echo "
			<script>
				alert('data gagal diubah!');
				document.location.href = 'tim2.php';
			</script>
		";
	}


}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Ubah data tim</title>
</head>
<style type="text/css">
      * {
        font-family: "Trebuchet MS";
      }
      h1 {
        text-transform: uppercase;
        color: lightgreen;
      }
    button {
          background-color: lightgreen;
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
	<center><h1>Ubah data tim</h1></center>

	<form action="" method="post" enctype="multipart/form-data">
		<input type="hidden" name="id" value="<?= $flo["id"]; ?>">
		<input type="hidden" name="gambarLama" value="<?= $flo["gambar"]; ?>">
		<section class="base">
			<div>
				<label for="nama">Nama : </label>
				<input type="text" name="nama" id="nama" required value="<?= $flo["nama"]; ?>">
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
				<label for="namatim">Tim :</label>
				<input type="text" name="namatim" id="namatim" value="<?= $flo["namatim"]; ?>">
			</div>
		<div>
		<label for="gambar">Gambar :</label> <br>
				<img src="img/<?= $flo['gambar']; ?>" width="40"> <br>
				<input type="file" name="gambar" id="gambar">
			</div>
			<div>
				<button type="submit" name="submit">Ubah Data!</button>
			</div>
		</ul>

	</form>




</body>
</html>

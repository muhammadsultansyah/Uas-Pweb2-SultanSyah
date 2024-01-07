<?php 
// koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "komunitas");


function query($query) {
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];
	while( $row = mysqli_fetch_assoc($result) ) {
		$rows[] = $row;
	}
	return $rows;
}
 

function tambah($data) {
	global $conn;

	$nik = ($data["nik"]);
	$nama = ($data["nama"]);
	$email = ($data["email"]);
	$nohp = ($data["nohp"]);
	$jeniskelamin = ($data["jeniskelamin"]);
	$tanggallahir = ($data["tanggallahir"]);
	$alamat = ($data["alamat"]);
	$posisi = ($data["posisi"]);

	// upload gambar
	$gambar = upload();
	if( !$gambar ) {
		return false;
	}

	$query = "INSERT INTO peserta
				VALUES
			  ('', '$nik', '$nama', '$email', '$nohp', '$jeniskelamin', '$tanggallahir', '$alamat', '$posisi', '$gambar')
			";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}


function upload() {

	$namaFile = $_FILES['gambar']['name'];
	$ukuranFile = $_FILES['gambar']['size'];
	$error = $_FILES['gambar']['error'];
	$tmpName = $_FILES['gambar']['tmp_name'];

	// cek apakah tidak ada gambar yang diupload
	if( $error === 4 ) {
		echo "<script>
				alert('pilih gambar terlebih dahulu!');
			  </script>";
		return false;
	}

	// cek apakah yang diupload adalah gambar
	$ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
	$ekstensiGambar = explode('.', $namaFile);
	$ekstensiGambar = strtolower(end($ekstensiGambar));
	if( !in_array($ekstensiGambar, $ekstensiGambarValid) ) {
		echo "<script>
				alert('yang anda upload bukan gambar!');
			  </script>";
		return false;
	}

	// cek jika ukurannya terlalu besar
	if( $ukuranFile > 1000000 ) {
		echo "<script>
				alert('ukuran gambar terlalu besar!');
			  </script>";
		return false;
	}

	// lolos pengecekan, gambar siap diupload
	// generate nama gambar baru
	$namaFileBaru = uniqid();
	$namaFileBaru .= '.';
	$namaFileBaru .= $ekstensiGambar;

	move_uploaded_file($tmpName, 'img/' . $namaFileBaru);

	return $namaFileBaru;
}




function hapus($id) {
	global $conn;
	mysqli_query($conn, "DELETE FROM peserta WHERE id = $id");
	return mysqli_affected_rows($conn);
}


function ubah($data) {
	global $conn;

	$id = $data["id"];
	$nik = ($data["nik"]);
	$nama = ($data["nama"]);
	$email = ($data["email"]);
	$nohp = ($data["nohp"]);
	$jeniskelamin = ($data["jeniskelamin"]);
	$tanggallahir = ($data["tanggallahir"]);
	$alamat = ($data["alamat"]);
	$posisi = ($data["posisi"]);
	$gambarLama = htmlspecialchars($data["gambarLama"]);
	
	// cek apakah user pilih gambar baru atau tidak
	if( $_FILES['gambar']['error'] === 4 ) {
		$gambar = $gambarLama;
	} else {
		$gambar = upload();
	}
	

	$query = "UPDATE peserta SET
				nik = '$nik',
				nama = '$nama',
				email = '$email',
				nohp = '$nohp',
				jeniskelamin = '$jeniskelamin',
				tanggallahir = '$tanggallahir',
				alamat = '$alamat',
				posisi = '$posisi',
				gambar = '$gambar'
			  WHERE id = $id
			";

	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);	
}


function cari($keyword) {
	$query = "SELECT * FROM peserta
				WHERE
			  nama LIKE '%$keyword%' OR
			  nik LIKE '%$keyword%' OR
			  email LIKE '%$keyword%' OR
			  nohp LIKE '%$keyword%'
			";
	return query($query);
}


?>

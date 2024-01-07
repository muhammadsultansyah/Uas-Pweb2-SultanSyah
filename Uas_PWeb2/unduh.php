<?php
include('koneksi.php'); // Hubungkan ke database jika diperlukan

// Set header untuk memberitahu browser bahwa ini adalah file CSV yang akan diunduh
header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="daftar_peserta.csv"');

// Buka output file untuk menulis data CSV
$output = fopen('php://output', 'w');

// Header CSV (nama kolom)
fputcsv($output, array('No', 'Nik', 'Nama', 'Email', 'No Hp', 'Jenis Kelamin', 'Tanggal Lahir', 'Alamat', 'Posisi', 'Gambar'));

// Ambil data peserta dari database
$data = mysqli_query($koneksi, "SELECT * FROM peserta");

// Tulis data peserta ke dalam file CSV
$no = 1;
while ($d = mysqli_fetch_array($data)) {
    fputcsv($output, array(
        $no++,
        $d['nik'],
        $d['nama'],
        $d['jeniskelamin'],
        $d['nohp'],
        $d['jeniskelamin'],
        $d['tanggallahir'],
        $d['alamat'],
        $d['posisi'],
        $d['gambar']
    ));
}

// Tutup file CSV
fclose($output);
?>

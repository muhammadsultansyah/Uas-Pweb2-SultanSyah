<?php
include('koneksi.php'); // Hubungkan ke database jika diperlukan

// Set header untuk memberitahu browser bahwa ini adalah file CSV yang akan diunduh
header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="daftar_jadwal.csv"');

// Buka output file untuk menulis data CSV
$output = fopen('php://output', 'w');

// Header CSV (nama kolom)
fputcsv($output, array('No', 'Tim', 'Tanggal Pertandingan', 'Jam','Gambar'));

// Ambil data jadwal dari database
$data = mysqli_query($koneksi, "SELECT * FROM jadwal");

// Tulis data jadwal ke dalam file CSV
$no = 1;
while ($d = mysqli_fetch_array($data)) {
    fputcsv($output, array(
        $no++,
        $d['nama'],
        $d['tanggalpertandingan'],
        $d['jam'],
        $d['gambar']
    ));
}

// Tutup file CSV
fclose($output);
?>

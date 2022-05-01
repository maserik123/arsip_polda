<?php
include '../koneksi.php';
session_start();
date_default_timezone_set('Asia/Jakarta');

// $waktu = date('Y-m-d H:i:s'); 
// $petugas = $_SESSION['id'];
$id  = $_POST['id'];
$kode  = $_POST['kode'];
$nama  = $_POST['nama'];

$rand = rand();

$filename = $_FILES['file']['name'];

$kategori = $_POST['kategori'];
$keterangan = $_POST['keterangan'];
$tanggal_surat = $_POST['tanggal_surat'];
$jumlah = $_POST['jumlah'];
$keterangan_jumlah = $_POST['keterangan_jumlah'];
$aktif_tahun = $_POST['aktif_tahun'];

if ($filename == "") {

	mysqli_query($koneksi, "update arsip set arsip_kode='$kode', arsip_nama='$nama', arsip_kategori='$kategori', arsip_keterangan='$keterangan', tanggal_surat = '$tanggal_surat', jumlah= '$jumlah', keterangan_jumlah = '$keterangan_jumlah', aktif_tahun='$aktif_tahun' where arsip_id='$id'") or die(mysqli_error($koneksi));
	header("location:arsip.php");
} else {

	$jenis = pathinfo($filename, PATHINFO_EXTENSION);

	if ($jenis == "php") {
		header("location:arsip.php?alert=gagal");
	} else {

		// hapus file lama
		$lama = mysqli_query($koneksi, "select * from arsip where arsip_id='$id'");
		$l = mysqli_fetch_assoc($lama);
		$nama_file_lama = $l['arsip_file'];
		unlink("../arsip/" . $nama_file_lama);

		// upload file baru
		move_uploaded_file($_FILES['file']['tmp_name'], '../arsip/' . $rand . '_' . $filename);
		$nama_file = $rand . '_' . $filename;
		mysqli_query($koneksi, "update arsip set arsip_kode='$kode', arsip_nama='$nama', arsip_jenis='$jenis', arsip_kategori='$kategori', arsip_keterangan='$keterangan', arsip_file='$nama_file' where arsip_id='$id'") or die(mysqli_error($koneksi));
		header("location:arsip.php?alert=sukses");
	}
}
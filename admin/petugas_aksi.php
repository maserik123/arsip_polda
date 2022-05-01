<?php
session_start();

include '../koneksi.php';
$nama  = $_POST['nama'];
$username = $_POST['username'];
$password = md5($_POST['password']);
$email = $_POST['email'];
$jabatan = $_POST['jabatan'];
$rand = rand();
$allowed =  array('gif', 'png', 'jpg', 'jpeg');
$filename = $_FILES['foto']['name'];

if ($filename == "") {
	mysqli_query($koneksi, "insert into petugas values (NULL,'$nama','$username','$password','$email','$jabatan','')");
	header("location:petugas.php");
} else {
	$ext = pathinfo($filename, PATHINFO_EXTENSION);

	if (!in_array($ext, $allowed)) {
		header("location:petugas.php?alert=gagal");
	} else {
		move_uploaded_file($_FILES['foto']['tmp_name'], '../gambar/petugas/' . $rand . '_' . $filename);
		$file_gambar = $rand . '_' . $filename;
		mysqli_query($koneksi, "insert into petugas values (NULL,'$nama','$username','$password','$email','$jabatan','$file_gambar')");
		header("location:petugas.php");
	}
}

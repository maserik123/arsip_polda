<?php session_start(); ?>

<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

include '../koneksi.php';
session_start();
date_default_timezone_set('Asia/Jakarta');

$waktu = date('Y-m-d H:i:s');
$petugas = $_SESSION['id'];
$kode  = $_POST['kode'];
$nama  = $_POST['nama'];

$rand = rand();

$filename = $_FILES['file']['name'];
$jenis = pathinfo($filename, PATHINFO_EXTENSION);

$kategori = $_POST['kategori'];
$keterangan = $_POST['keterangan'];
$tanggal_surat = $_POST['tanggal_surat'];
$jumlah = $_POST['jumlah'];
$keterangan_jumlah = $_POST['keterangan_jumlah'];
$aktif_tahun = $_POST['aktif_tahun'];
$jenis_surat = $_POST['jenis_surat'];


//Tambahan
$tgl1 = $_POST['tanggal_surat'];
$tgl2 = $_POST['aktif_tahun'];
// $sekarang =  date('Y-m-d');
$aktif_sampai = date('Y-m-d', strtotime(+$tgl2 . 'year', strtotime($tgl1)));

if ($jenis == "php") {
	header("location:arsip.php?alert=gagal");
} else {
	move_uploaded_file($_FILES['file']['tmp_name'], '../arsip/' . $rand . '_' . $filename);
	$nama_file = $rand . '_' . $filename;
	mysqli_query($koneksi, "insert into arsip values (NULL,'$waktu','$petugas','$kode','$nama','$jenis','$kategori','$jenis_surat','$tanggal_surat', '$jumlah','$keterangan_jumlah', '$aktif_tahun','$aktif_sampai', '$keterangan','$nama_file', 'Null')") or die(mysqli_error($koneksi));
	header("location:arsip.php?alert=sukses");


	// Script untuk mengirimkan email

	// Include librari phpmailer
	include('../phpmailer/Exception.php');
	include('../phpmailer/PHPMailer.php');
	include('../phpmailer/SMTP.php');

	$email_pengirim = 'arsippoldariau@gmail.com'; // Isikan dengan email pengirim
	$nama_pengirim = 'Sistem Informasi Kearsipan Polda Riau'; // Isikan dengan nama pengirim
	$email_penerima = 'fitraarrafiq@gmail.com'; // Ambil email penerima dari inputan form
	$subjek = 'Naskah baru telah diupload [' . date('Y/m/d H:i:s') . ']'; // Ambil subjek dari inputan form
	$pesan = 'This email auto generate by System. <br> No Reply'; // Ambil pesan dari inputan form
	// $attachment = $_FILES['attachment']['name']; // Ambil nama file yang di upload

	$mail = new PHPMailer;
	$mail->isSMTP();

	$mail->Host = 'smtp.gmail.com';
	$mail->Username = $email_pengirim; // Email Pengirim
	$mail->Password = 'polda123'; // Isikan dengan Password email pengirim
	$mail->Port = 465;
	$mail->SMTPAuth = true;
	$mail->SMTPSecure = 'ssl';
	// $mail->SMTPDebug = 2; // Aktifkan untuk melakukan debugging

	$mail->setFrom($email_pengirim, $nama_pengirim);
	$mail->addAddress($email_penerima, '');
	$mail->isHTML(true); // Aktifkan jika isi emailnya berupa html

	// Load file content.php
	ob_start();
	include "content.php";

	$content = ob_get_contents(); // Ambil isi file content.php dan masukan ke variabel $content
	ob_end_clean();

	$mail->Subject = $subjek;
	$mail->Body = '<b></b>Surat baru telah diupload dengan keterangan berikut : </b><br> Nama Surat : ' . $nama . ' <br>Kode Surat : ' . $kode . ' <br> Kategori  : ' . $kategori . ' <br> Tanggal Surat : ' . $tanggal_surat . ' <br> Status : Berhasil diupload ! <br><br><br> This email is generate by System. <br> No Reply !';
	// $mail->AddEmbeddedImage('image/logo.png', 'logo_mynotescode', 'logo.png'); // Aktifkan jika ingin menampilkan gambar dalam email

	$send = $mail->send();

	if ($send) {
		if ($send) { // Jika Email berhasil dikirim
			header("location:arsip.php", 'Success send to mail');
			// echo "<h1>Email berhasil dikirim</h1><br /><a href='index.php'>Kembali ke Form</a>";
		} else { // Jika Email gagal dikirim
			header("location:arsip.php", 'Pesan gagal di kirim');
			// echo "<h1>Email gagal dikirim</h1><br /><a href='index.php'>Kembali ke Form</a>";
			// echo '<h1>ERROR<br /><small>Error while sending email: '.$mail->getError().'</small></h1>'; // Aktifkan untuk mengetahui error message
		}
	}
}

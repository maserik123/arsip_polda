<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

include '../koneksi.php';
session_start();
date_default_timezone_set('Asia/Jakarta');

$waktu = date('Y-m-d H:i:s');
$arsip_id = $_POST['id'];
$petugas_id  = $_POST['petugas_id'];


mysqli_query($koneksi, "insert into disposisi values (NULL,'$arsip_id','$petugas_id','Null')") or die(mysqli_error($koneksi));
header("location:arsip.php?alert=sukses");


// Script untuk mengirimkan email

// Include librari phpmailer
include('../phpmailer/Exception.php');
include('../phpmailer/PHPMailer.php');
include('../phpmailer/SMTP.php');

$email_pengirim = 'arsippoldariau@gmail.com'; // Isikan dengan email pengirim
$nama_pengirim = 'Sistem Informasi Kearsipan Polda Riau'; // Isikan dengan nama pengirim
$b = mysqli_query($koneksi, 'select * from petugas where petugas_id = ' . $petugas_id);
$row1 = mysqli_fetch_row($b);
$email_penerima = $row1[4]; // Ambil email penerima dari inputan form
$subjek = 'Disposisi Kepada Bawahan - [' . date('Y/m/d H:i:s') . ']'; // Ambil subjek dari inputan form
$pesan = 'This email only testing <br> No Reply'; // Ambil pesan dari inputan form
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
// ob_start();
// include "content.php";

// $content = ob_get_contents(); // Ambil isi file content.php dan masukan ke variabel $content
// ob_end_clean();

$mail->Subject = $subjek;
$a = mysqli_query($koneksi, 'select * from arsip where arsip_id = ' . $arsip_id);
$row = mysqli_fetch_row($a);
$mail->Body = 'Anda Mendapatkan disposisi surat dengan keterangan sebagai berikut : <br>
Nama Surat : ' . $row[4] . '<br> 
Kode Surat : ' . $row[3] . '<br>
Jenis Surat : ' . $row[7] . ' <br>
Disposisi dari : ' . $_SESSION['nama'] . '<br><br>
This email is generate by system !';
// $mail->AddEmbeddedImage('image/logo.png', 'logo_mynotescode', 'logo.png'); // Aktifkan jika ingin menampilkan gambar dalam email

$send = $mail->send();

if ($send) {
    if ($send) { // Jika Email berhasil dikirim
        echo '<script>alert("Disposition Successfully, notification will send by email")</script>';
        header("location:arsip_preview.php?id=" . $arsip_id, '<script>alert("Disposition Successfully, notification will send by email")</script>');
        // echo "<h1>Email berhasil dikirim</h1><br /><a href='index.php'>Kembali ke Form</a>";
    } else { // Jika Email gagal dikirim
        header("location:arsip_preview.php?id=" . $arsip_id, 'Pesan gagal di kirim');
        echo '';

        // echo "<h1>Email gagal dikirim</h1><br /><a href='index.php'>Kembali ke Form</a>";
        // echo '<h1>ERROR<br /><small>Error while sending email: '.$mail->getError().'</small></h1>'; // Aktifkan untuk mengetahui error message
    }
}

<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Include librari phpmailer
include('../phpmailer/Exception.php');
include('../phpmailer/PHPMailer.php');
include('../phpmailer/SMTP.php');

$email_pengirim = 'arsippoldariau@gmail.com'; // Isikan dengan email pengirim
$nama_pengirim = 'Sistem Informasi Kearsipan Polda Riau'; // Isikan dengan nama pengirim
$email_penerima = 'fitraarrafiq@gmail.com'; // Ambil email penerima dari inputan form
$subjek = 'Testing Email Gmail'; // Ambil subjek dari inputan form
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
ob_start();
include "content.php";

$content = ob_get_contents(); // Ambil isi file content.php dan masukan ke variabel $content
ob_end_clean();

$mail->Subject = $subjek;
$mail->Body = $content;
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

// if (empty($attachment)) { // Jika tanpa attachment

//     if ($send) { // Jika Email berhasil dikirim
//         echo "<h1>Email berhasil dikirim</h1><br /><a href='index.php'>Kembali ke Form</a>";
//     } else { // Jika Email gagal dikirim
//         echo "<h1>Email gagal dikirim</h1><br /><a href='index.php'>Kembali ke Form</a>";
//         // echo '<h1>ERROR<br /><small>Error while sending email: '.$mail->getError().'</small></h1>'; // Aktifkan untuk mengetahui error message
//     }
// } else { // Jika dengan attachment
//     $tmp = $_FILES['attachment']['tmp_name'];
//     $size = $_FILES['attachment']['size'];

//     if ($size <= 25000000) { // Jika ukuran file <= 25 MB (25.000.000 bytes)
//         $mail->addAttachment($tmp, $attachment); // Add file yang akan di kirim

//         $send = $mail->send();

//         if ($send) { // Jika Email berhasil dikirim
//             echo "<h1>Email berhasil dikirim</h1><br /><a href='index.php'>Kembali ke Form</a>";
//         } else { // Jika Email gagal dikirim
//             echo "<h1>Email gagal dikirim</h1><br /><a href='index.php'>Kembali ke Form</a>";
//             // echo '<h1>ERROR<br /><small>Error while sending email: '.$mail->getError().'</small></h1>'; // Aktifkan untuk mengetahui error message
//         }
//     } else { // Jika Ukuran file lebih dari 25 MB
//         echo "<h1>Ukuran file attachment maksimal 25 MB</h1><br /><a href='index.php'>Kembali ke Form</a>";
//     }
// }

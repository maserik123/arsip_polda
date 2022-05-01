<style>
@media print {
    @page {
        size: auto;
        margin: 0mm;
    }
}
</style>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>




<?php
include '../koneksi.php';
session_start();
if ($_SESSION['status'] != "petugas_login") {
    header("location:../login.php?alert=belum_login");
}

$tgl_awal = $_GET['awal'];
$tgl_akhir = $_GET['akhir'];

//TANGGAL INDO
function tanggal_indo($tanggal)
{
    $bulan = array(
        1 =>   'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    );
    $split = explode('-', $tanggal);
    return $split[2] . ' ' . $bulan[(int)$split[1]] . ' ' . $split[0];
}
?>

<body onload="window.print()" class="m-5">
    <div class="text-center mb-5">
        <h3>DAFTAR ARSIP KANTOR CAMAT SUKAJADI</h3>
        <h3><?php echo tanggal_indo($tgl_awal); ?> -
            <?php echo tanggal_indo($tgl_akhir); ?></h3>
    </div>
    <table id="table" class="table table-bordered">
        <thead>
            <tr class="text-center" style="background-color: yellow;">
                <th width="1%">No</th>
                <th>KODE KLASIFIKASI</th>
                <th>URAIAN INFORMASI ARSIP</th>
                <!-- <th>Petugas</th> -->
                <th>TANGGAL SURAT</th>
                <th>Jumlah</th>
                <!-- <th>Aktif Sampai</th> -->
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include '../koneksi.php';
            $no = 1;
            $saya = $_SESSION['id'];
            $jenis = "masuk";

            $tgl_awal = $_GET['awal'];
            $tgl_akhir = $_GET['akhir'];
            $arsip = mysqli_query($koneksi, "SELECT * FROM arsip,kategori,petugas WHERE arsip_petugas=petugas_id and arsip_petugas='$saya'   and tanggal_surat BETWEEN '" . $tgl_awal . "' AND '" . $tgl_akhir . "' ORDER BY arsip_id DESC");

            while ($p = mysqli_fetch_array($arsip)) {
                $tgl1 = $p['tanggal_surat'];
                $tgl2 = $p['aktif_tahun'];
                $sekarang =  date('Y-m-d');
                $tglaktif = date('Y-m-d', strtotime(+$tgl2 . 'year', strtotime($tgl1)));

            ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <!-- <td><?php echo date('H:i:s  d-m-Y', strtotime($p['arsip_waktu_upload'])) ?></td> -->
                <td class="text-center"><?php echo $p['arsip_kategori'] ?></td>
                <td>

                    <b>No Surat</b> : <?php echo $p['arsip_kode'] ?><br>
                    <b>Nama Surat</b> : <?php echo $p['arsip_nama'] ?><br>
                    <!-- <b>Jenis</b> : <?php echo $p['arsip_jenis'] ?><br> -->

                </td>
                <td class="text-center"><?php echo $p['tanggal_surat'] ?></td>
                <td class="text-center"><?php echo $p['jumlah'] . " " . $p['keterangan_jumlah'] ?></td>
                <!-- <td><?php echo $tglaktif ?></td> -->
                <!-- <td><?php echo $p['petugas_nama'] ?></td> -->
                <td class="text-center"><?php echo $p['arsip_keterangan'] ?></td>
            </tr>
            <?php
            }
            ?>
        </tbody>
    </table>

</body>
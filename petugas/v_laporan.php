<?php include 'header.php'; ?>


<style>
.bg-1 {
    background-color: yellow;
}

.bg-2 {
    background-color: blue;
}
</style>

<div class="breadcome-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="breadcome-list">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="breadcome-heading">
                                <form action="v_laporan.php" method="get">
                                    <div class="row">
                                        <div class="col-sm-6 col-md-4">
                                            <div class="form-group">
                                                <label>Filter Tanggal</label>
                                                <div class="input-group">
                                                    <input type="date" name="tgl_awal" class="form-control tgl_awal"
                                                        placeholder="Tanggal Awal">
                                                    <span class="input-group-addon">s/d</span>
                                                    <input type="date" name="tgl_akhir" class="form-control tgl_akhir"
                                                        placeholder="Tanggal Akhir">
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" name="filter" value="true"
                                        class="btn btn-primary">TAMPILKAN</button>
                                    <?php
                                    if (isset($_GET['filter'])) // Jika user mengisi filter tanggal, maka munculkan tombol untuk reset filter
                                        echo '<a href="v_laporan.php" class="btn btn-default">RESET</a>';
                                    ?>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <ul class="breadcome-menu" style="padding-top: 0px">
                                <li><a href="#">Home</a> <span class="bread-slash">/</span></li>
                                <li><span class="bread-blod">Arsip</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="panel panel">

        <!-- <div class="panel-heading">
            <h3 class="panel-title">Data Arsip Saya</h3>
        </div> -->
        <div class="panel-body table-responsive">


            <!-- <div class="pull-right">
                <a href="arsip_tambah.php" class="btn btn-primary"><i class="fa fa-cloud"></i> Input Arsip</a>
            </div> -->

            <br>
            <br>
            <br>

            <center>
                <?php
                if (isset($_GET['alert'])) {
                    if ($_GET['alert'] == "gagal") {
                ?>
                <div class="alert alert-danger">File arsip gagal diupload. krena demi keamanan file .php tidak
                    diperbolehkan.</div>
                <?php
                    } else {
                    ?>
                <div class="alert alert-success">Arsip berhasil tersimpan.</div>
                <?php
                    }
                }
                ?>
            </center>
            <table id="table" class="table table-bordered  table-datatable">
                <thead>
                    <tr>
                        <th width="1%">No</th>
                        <th>Waktu Upload</th>
                        <th>Arsip</th>
                        <th>Kategori</th>
                        <!-- <th>Petugas</th> -->
                        <th>Tanggal Surat</th>
                        <th>Jumlah</th>
                        <th>Aktif Sampai</th>
                        <th>Keterangan</th>
                        <!-- <th class="text-center" width="20%">OPSI</th> -->
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include '../koneksi.php';
                    $no = 1;
                    $saya = $_SESSION['id'];
                    $jenis = "masuk";

                    if (isset($_GET['tgl_awal'])) {
                        $tgl_awal = $_GET['tgl_awal'];
                        $tgl_akhir = $_GET['tgl_akhir'];
                        $arsip = mysqli_query($koneksi, "SELECT * FROM arsip,kategori,petugas WHERE arsip_petugas=petugas_id and arsip_petugas='$saya'  and tanggal_surat BETWEEN '" . $tgl_awal . "' AND '" . $tgl_akhir . "' ORDER BY arsip_id DESC");
                    } else {
                        $arsip = mysqli_query($koneksi, "SELECT * FROM arsip,kategori,petugas WHERE arsip_petugas=petugas_id and arsip_petugas='$saya'  ORDER BY arsip_id DESC");
                    }

                    while ($p = mysqli_fetch_array($arsip)) {
                        $tgl1 = $p['tanggal_surat'];
                        $tgl2 = $p['aktif_tahun'];
                        $sekarang =  date('Y-m-d');
                        $tglaktif = date('Y-m-d', strtotime(+$tgl2 . 'year', strtotime($tgl1)));

                    ?>
                    <tr class="<?php
                                    if ($tglaktif < $sekarang) {
                                        echo "bg-1";
                                    }

                                    ?>">
                        <td><?php echo $no++; ?></td>
                        <td><?php echo date('H:i:s  d-m-Y', strtotime($p['arsip_waktu_upload'])) ?></td>
                        <td>

                            <b>No Surat</b> : <?php echo $p['arsip_kode'] ?><br>
                            <b>Nama Surat</b> : <?php echo $p['arsip_nama'] ?><br>
                            <b>Jenis</b> : <?php echo $p['arsip_jenis'] ?><br>

                        </td>
                        <td><?php echo $p['arsip_kategori'] ?></td>
                        <td><?php echo $p['tanggal_surat'] ?></td>
                        <td><?php echo $p['jumlah'] . " " . $p['keterangan_jumlah'] ?></td>
                        <td><?php echo $tglaktif ?></td>
                        <!-- <td><?php echo $p['petugas_nama'] ?></td> -->
                        <td><?php echo $p['arsip_keterangan'] ?></td>
                        <!-- <td class="text-center">



                            <div class="modal fade" id="exampleModal_<?php echo $p['arsip_id']; ?>" tabindex="-1"
                                role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">PERINGATAN!</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Apakah anda yakin ingin menghapus data ini? <br>file dan semua yang
                                            berhubungan akan dihapus secara permanen.
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Batalkan</button>
                                            <a href="arsip_hapus.php?id=<?php echo $p['arsip_id']; ?>"
                                                class="btn btn-primary"><i class="fa fa-check"></i> &nbsp; Ya, hapus</a>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="btn-group">
                                <a target="_blank" class="btn btn-default"
                                    href="../arsip/<?php echo $p['arsip_file']; ?>"><i class="fa fa-download"></i></a>
                                <a target="_blank" href="arsip_preview.php?id=<?php echo $p['arsip_id']; ?>"
                                    class="btn btn-default"><i class="fa fa-search"></i> Preview</a>
                                <a href="arsip_edit.php?id=<?php echo $p['arsip_id']; ?>" class="btn btn-default"><i
                                        class="fa fa-wrench"></i></a>
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#exampleModal_<?php echo $p['arsip_id']; ?>">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </div>
                        </td> -->
                    </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>


        </div>

    </div>
    <div class="row">
        <div class="col-lg-3">
            <a href="cetak.php?awal=<?= $tgl_awal; ?>&&akhir=<?= $tgl_akhir; ?>" target="_blank" class="btn btn-primary"
                rel="noopener noreferrer">Cetak Laporan</a>
        </div>
    </div>
</div>



<?php include 'footer.php'; ?>
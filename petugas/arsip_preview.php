<?php include 'header.php'; ?>

<div class="breadcome-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="breadcome-list">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="breadcome-heading">
                                <h4 style="margin-bottom: 0px">Preview Arsip</h4>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <ul class="breadcome-menu" style="padding-top: 0px">
                                <li><a href="#">Home</a> <span class="bread-slash">/</span></li>
                                <li><span class="bread-blod">Preview</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">


    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel">

                <div class="panel-heading">
                    <h3 class="panel-title">Preview Arsip</h3>
                </div>
                <div class="panel-body">

                    <a href="arsip.php" class="btn btn-sm btn-primary"><i class="fa fa-arrow-left"></i> Kembali</a>

                    <br>
                    <br>

                    <?php
                    $id = $_GET['id'];
                    $data = mysqli_query($koneksi, "SELECT * FROM arsip,kategori,petugas WHERE arsip_petugas=petugas_id and arsip_id='$id'");
                    while ($d = mysqli_fetch_array($data)) {
                    ?>

                        <div class="row">
                            <div class="col-lg-4">

                                <table class="table">
                                    <tr>
                                        <th>Kode Arsip</th>
                                        <td><?php echo $d['arsip_kode']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Waktu Upload</th>
                                        <td><?php echo date('H:i:s  d-m-Y', strtotime($d['arsip_waktu_upload'])) ?></td>
                                    </tr>
                                    <tr>
                                        <th>Nama File</th>
                                        <td><?php echo $d['arsip_nama']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Kategori</th>
                                        <td><?php echo $d['arsip_kategori']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Jenis File</th>
                                        <td><?php echo $d['arsip_jenis']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Petugas Pengupload</th>
                                        <td><?php echo $d['petugas_nama']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Keterangan</th>
                                        <td><?php echo $d['arsip_keterangan']; ?></td>
                                    </tr>
                                    <?php
                                    if ($_SESSION['jabatan'] == "pimpinan") { ?>
                                        <tr>
                                            <th>Disposisikan</th>
                                            <?php
                                            $qu = mysqli_query($koneksi, "SELECT * FROM disposisi WHERE arsip_id='$id'");
                                            $r = mysqli_num_rows($qu);
                                            if ($r > 0) { ?>
                                                <td>
                                                    <?php $q2 = mysqli_query($koneksi, "select a.petugas_nama from petugas a inner join disposisi b on b.petugas_id = a.petugas_id where arsip_id = '$id' ");
                                                    while ($baris = mysqli_fetch_array($q2)) { ?>
                                                        <button class="btn btn-xs btn-success" style="font-size: 11px;color: white;">Sudah disposisi kepada <?php echo $baris['petugas_nama'] ?></button>
                                                    <?php } ?>
                                                </td>
                                            <?php } else { ?>
                                                <td>
                                                    <button class="btn btn-xs btn-danger" data-toggle="modal" data-target="#myModal" style="font-size: 11px;color: white;">Disposisikan <i class="fa fa-arrow-down"></i> </button>
                                                </td>
                                            <?php } ?>
                                        </tr>
                                    <?php } ?>
                                </table>

                            </div>
                            <div class="col-lg-8">

                                <?php
                                if ($d['arsip_jenis'] == "png" || $d['arsip_jenis'] == "jpg" || $d['arsip_jenis'] == "gif" || $d['arsip_jenis'] == "jpeg") {
                                ?>
                                    <img src="../arsip/<?php echo $d['arsip_file']; ?>">

                                <?php
                                } elseif ($d['arsip_jenis'] == "pdf") {
                                ?>

                                    <div class="pdf-singe-pro table-responsive">
                                        <a class="media" href="../arsip/<?php echo $d['arsip_file']; ?>"></a>
                                    </div>

                                <?php
                                } else {
                                ?>
                                    <p>Preview tidak tersedia, silahkan <a target="_blank" style="color: blue" href="../arsip/<?php echo $d['arsip_file']; ?>">Download di sini.</a></p>.
                                <?php
                                }
                                ?>

                            </div>
                        </div>
                    <?php
                    }
                    ?>

                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div id="myModal" class="modal fade " role="dialog">
        <div class="modal-dialog modal-sm">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Pilih Tujuan Disposisi</h4>
                </div>
                <form method="post" action="disposisi_proses.php">
                    <input type="hidden" value="<?php echo $id; ?>" name="id" id="id">
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Disposisikan ke -</label>
                            <select class="form-control" name="petugas_id" required="required">
                                <option value="">Semua</option>
                                <?php
                                $id = $_GET['id'];
                                $data = mysqli_query($koneksi, "SELECT * FROM petugas WHERE jabatan = 'petugas' order by petugas_id desc ");
                                while ($d = mysqli_fetch_array($data)) { ?>
                                    <option value="<?php echo $d['petugas_id'] ?>"><?php echo $d['petugas_nama'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                    </div>
                </form>
            </div>

        </div>
    </div>

</div>



<?php include 'footer.php'; ?>
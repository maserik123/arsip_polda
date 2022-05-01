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
                                <h4 style="margin-bottom: 0px">Semua Arsip</h4>
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

        <div class="panel-heading">
            <h3 class="panel-title">Disposisikan Naskah ke Petugas</h3>
        </div>
        <div class="panel-body">


            <div class="pull-right">
                <?php
                if ($_SESSION['jabatan'] == "petugas") { ?>
                    <a href="arsip_tambah.php" class="btn btn-primary"><i class="fa fa-cloud"></i> Input Arsip</a>
                <?php } ?>
            </div>

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
            <div class="table-responsive">
                <table id="table" class="table table-bordered  table-datatable">
                    <thead>
                        <tr>
                            <th width="1%">No</th>
                            <th>Nama Surat</th>
                            <th>Kode Surat</th>
                            <th>Tujuan Disposisi</th>
                            <th>Email</th>
                            <th class="text-center" width="20%">Tools</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include '../koneksi.php';
                        $no = 1;
                        $saya = $_SESSION['id'];
                        $arsip = mysqli_query($koneksi, "select a.arsip_nama, a.arsip_kode, b.petugas_nama, b.email from disposisi c inner join arsip a on c.arsip_id = a.arsip_id
                        inner join petugas b on c.petugas_id = b.petugas_id");
                        while ($p = mysqli_fetch_array($arsip)) {
                        ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $p['arsip_nama']; ?></td>
                                <td><?php echo $p['arsip_kode'] ?></td>
                                <td><?php echo $p['petugas_nama'] ?></td>
                                <td><?php echo $p['email'] ?></td>
                                <td> <a href="arsip_edit.php?id=<?php echo $p['arsip_id']; ?>" class="btn btn-default">Disposisikan <i class="fa fa-arrow-right"></i></a></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>

            </div>


        </div>

    </div>
</div>


<?php include 'footer.php'; ?>
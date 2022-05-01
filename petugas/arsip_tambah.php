<?php include 'header.php'; ?>
<?php session_start(); ?>

<div class="breadcome-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="breadcome-list">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="breadcome-heading">
                                <h4 style="margin-bottom: 0px">Input Arsip</h4>
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


    <div class="row">
        <div class="col-lg-6 col-lg-offset-3">
            <div class="panel panel">

                <!-- <div class="panel-heading">
                    <h3 class="panel-title">Upload arsip</h3>
                </div> -->
                <div class="panel-body">

                    <div class="pull-right">
                        <a href="arsip.php" class="btn btn-sm btn-primary"><i class="fa fa-arrow-left"></i> Kembali</a>
                    </div>

                    <br>
                    <br>

                    <form method="post" action="arsip_aksi.php" enctype="multipart/form-data">

                        <div class="form-group">
                            <label>Kode Klasifikasi Arsip</label>
                            <!-- <input type="text" class="form-control" name="kategori" required="required"> -->
                            <select class="form-control" name="kategori" required="required">
                                <option value="">Pilih kategori</option>
                                <?php
                                $kategori = mysqli_query($koneksi, "SELECT * FROM kategori");
                                while ($k = mysqli_fetch_array($kategori)) {
                                ?>
                                    <option value="<?php echo $k['kategori_id']; ?>"><?php echo $k['kategori_nama']; ?>
                                    </option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Jenis Surat</label>
                            <select class="form-control" name="jenis_surat" required="required">
                                <option value="masuk">Surat Masuk</option>
                                <option value="keluar">Surat Keluar</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Nomer Surat</label>
                            <input type="text" class="form-control" name="kode" required="required">
                        </div>

                        <div class="form-group">
                            <label>Nama Surat</label>
                            <input type="text" class="form-control" name="nama" required="required">
                        </div>

                        <div class="form-group">
                            <label>Tanggal Surat</label>
                            <input type="date" class="form-control" name="tanggal_surat" required="required">
                        </div>

                        <div class="form-group">
                            <label>Jumlah</label>
                            <input type="number" class="form-control" name="jumlah" required="required">
                        </div>

                        <div class="form-group">
                            <label>Keterangan Jumlah</label>
                            <select class="form-control" name="keterangan_jumlah" required="required">
                                <option value="Lembar">Lembar</option>
                                <option value="Berkas">Berkas</option>
                                <option value="Buku">Buku</option>
                                <option value="Dokumen">Dokumen</option>
                                <option value="Buah">Buah</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Aktif Tahun</label>
                            <input type="number" class="form-control" name="aktif_tahun" required="required">
                        </div>

                        <div class="form-group">
                            <label>Keterangan</label>
                            <select class="form-control" name="keterangan" required="required">
                                <option value="Tekstual">Tekstual</option>
                                <option value="Kartografi">Kartografi</option>
                                <option value="Audio Visual">Audio Visual</option>
                                <option value="Elektronik">Elektronik</option>
                                <option value="Digital">Digital</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>File</label>
                            <input type="file" name="file">
                        </div>

                        <div class="form-group">
                            <label></label>
                            <input type="submit" class="btn btn-primary" value="Simpan">
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>


</div>


<?php include 'footer.php'; ?>
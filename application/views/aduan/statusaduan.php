<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= $judul ?></title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url() ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url() ?>assets/css/sb-admin-2.css" rel="stylesheet">

</head>
<body class="gambar">
    <div class="container col-lg-10">
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <div class="row">
                    <div class="col-lg-16">
                        <div class="p-5">
                            <?php if (!empty($aduan)) : ?>
                                <table class="tabel">
                                <img src="<?php echo base_url() ?>/assets/img/selamat.png" width="1650px" height="600px" class="img-fluid">

                                    <h3 class="mb-2"><center>Data Aduan</center></h3>
                                    <tbody>
                                        <tr>
                                            <th>Nomor Aduan</th>
                                            <th style="width: 30px"><center>: </center></th>
                                            <th><?= $aduan->nomor; ?></th>
                                        </tr>
                                        <tr>
                                            <th>Tanggal</th>
                                            <th style="width: 30px"><center>: </center></th>
                                            <th><?= $aduan->tanggal; ?></th>
                                        </tr>
                                        <tr>
                                            <th>Kategori</th>
                                            <th style="width: 30px"><center>: </center></th>
                                            <th><?= $aduan->kategori; ?></th>
                                        </tr>
                                        <tr>
                                            <th>Aduan</th>
                                            <th style="width: 30px"><center>: </center></th>
                                            <th><?= nl2br($aduan->aduan); ?></th>
                                        </tr>
                                        <tr>
                                            <th>File</th>
                                            <th style="width: 30px"><center>: </center></th>
                                            <th><?php
                                            $fileNames = explode(',', $aduan->file);
                                            foreach ($fileNames as $fileName) {
                                                echo '<a href="' . base_url('direktori/' . $fileName) . '" target="_blank" class=" mb-2">[Lihat File]</a><br>';
                                            }
                                            ?></th>
                                        </tr>

                                    </tbody>
                                </table>
                                <a href="<?= base_url('aduan') ?>" class="btn btn-primary mt-3">Kembali</a>
                                <?php else : ?>
                                    <center>
                                        <h1>Maaf</h1>
                                        <p>Data aduan tidak ditemukan.</p>
                                        <a href="<?= base_url('aduan/cekaduan') ?>" class="btn btn-primary">Cek aduan lain</a>
                                        <a href="<?= base_url('aduan') ?>" class="btn btn-secondary">Kembali</a>
                                    </center>
                                <?php endif; ?>
                                <br>
                                <?php if (!empty($aduan)) { ?>
                                    <table class="table table-primary mt-5" style="border: 2px"> 
    <thead> 
        <tr>    
            <th style="color: black">Status</th>
            <th style="color: black">Keterangan</th>
            <th style="color: black">Tanggal</th>
        </tr>   
    </thead>    
    <tbody style="border-color: black"> 
        <!-- 1 -->
        <?php if($aduan->verif == "PENGADUAN SEDANG DIVERIFIKASI PETUGAS"){ ?>    
            <td>
                <p class="badge" style="background-color: grey;color: #fff">ADUAN SEDANG DIVERIFIKASI PETUGAS</p>
            </td>
            <td>
                <p class="badge" style="background-color: grey;color: #fff">ADUAN DIPERIKSA</p>
            </td>
            <td>
                <p class="badge" style="background-color: grey;color: #fff"><?= date('d-m-Y', strtotime($aduan->tanggal)) ?></p>

            </td>
        <!-- 1 -->
        <?php }elseif($aduan->verif == "PENGADUAN DITERIMA PETUGAS"){ ?>
            <tr>
             <td>
                <p class="badge" style="background-color: grey;color: #fff">ADUAN SEDANG DIVERIFIKASI PETUGAS</p>
            </td>
            <td>
                <p class="badge" style="background-color: grey;color: #fff">ADUAN DIPERIKSA</p>
            </td>
            <td>
               <p class="badge" style="background-color: grey;color: #fff"><?= date('d-m-Y', strtotime($aduan->tanggal)) ?></p>
            </td>
        </tr>
        <tr>
            <td>
                <p class="badge" style="background-color: green;color: #fff">ADUAN DITERIMA PETUGAS</p>
            </td>
            <td>
                <p class="badge" style="background-color: green;color: #fff">ADUAN DITERIMA</p>
            </td>
            <td>
                <p class="badge" style="background-color: grey;color: #fff"><?= date('d-m-Y', strtotime($aduan->proses1)) ?></p>

            </td>
        </tr>

        <?php if ($aduan->keterangan != null){ ?>
            <tr>
                <td></td>
                <td>
                    <p class="badge" style="background-color: blue;color: #fff"><?= $aduan->keterangan ?></p>
                </td>
                <td>
                <p class="badge" style="background-color: grey;color: #fff"><?= date('d-m-Y', strtotime($aduan->tanggal_disesuaikan)) ?></p>

            </td>
            </tr>
            <tr>
                <td>
                    <p class="badge" style="background-color: red;color: #fff">KATEGORI AWAL</p>
                </td>
                <td><p class="badge" style="background-color: red;color: #fff"><?= $aduan->kategori ?></p></td>
                  <td>
                <p class="badge" style="background-color: grey;color: #fff"><?= date('d-m-Y', strtotime($aduan->tanggal)) ?></p>

            </td>
            </tr>
            <tr>
               <td>
                    <p class="badge" style="background-color: blue;color: #fff">KATEGORI DISESUAIKAN</p>
                </td>
                <td><p class="badge" style="background-color: blue;color: #fff"><?= $aduan->kategori_disesuaikan ?></p></td>
                 <td>
                <p class="badge" style="background-color: grey;color: #fff"><?= date('d-m-Y', strtotime($aduan->tanggal_disesuaikan)) ?></p>

            </td>
            </tr>
        <?php }else{ ?>
        <?php } ?>
        <!-- 1 -->
    <?php }elseif($aduan->verif == "PENGADUAN DITOLAK PETUGAS"){ ?>
        <tr>
         <td>
            <p class="badge" style="background-color: grey;color: #fff">ADUAN SEDANG DIVERIFIKASI PETUGAS</p>
        </td>
        <td>
            <p class="badge" style="background-color: grey;color: #fff">ADUAN DIPERIKSA</p>
        </td>
                    <td>
               <p class="badge" style="background-color: grey;color: #fff"><?= date('d-m-Y', strtotime($aduan->tanggal)) ?></p>
            </td>
    </tr>
    <tr>
        <td>
            <p class="badge" style="background-color: red;color: #fff">ADUAN DITOLAK PETUGAS</p>
        </td>
        <td>
            <p class="badge" style="background-color: red;color: #fff">ADUAN DITOLAK</p>
        </td>
        <td>
                <p class="badge" style="background-color: grey;color: #fff"><?= date('d-m-Y', strtotime($aduan->proses1)) ?></p>

            </td>
    </tr>
     <!-- 1 -->
<?php }elseif($aduan->verif == "PENGADUAN SEDANG DIPROSES PIMPINAN"){ ?>
    <tr>
     <td>
        <p class="badge" style="background-color: grey;color: #fff">ADUAN SEDANG DIVERIFIKASI PETUGAS</p>
    </td>
    <td>
        <p class="badge" style="background-color: grey;color: #fff">ADUAN DIPERIKSA</p>
    </td>
                <td>
               <p class="badge" style="background-color: grey;color: #fff"><?= date('d-m-Y', strtotime($aduan->tanggal)) ?></p>
            </td>
</tr>
<tr>
    <td>
        <p class="badge" style="background-color: green;color: #fff">ADUAN DITERIMA PETUGAS</p>
    </td>
    <td>
        <p class="badge" style="background-color: green;color: #fff">ADUAN DITERIMA</p>
    </td>
    <td>
                <p class="badge" style="background-color: grey;color: #fff"><?= date('d-m-Y', strtotime($aduan->proses1)) ?></p>

            </td>
</tr>
<tr>
    <?php if ($aduan->keterangan != null){ ?>
            <tr>
                <td></td>
                <td>
                    <p class="badge" style="background-color: blue;color: #fff"><?= $aduan->keterangan ?></p>
                </td>
                <td>
                <p class="badge" style="background-color: grey;color: #fff"><?= date('d-m-Y', strtotime($aduan->tanggal_disesuaikan)) ?></p>

            </td>
            </tr>
            <tr>
                <td>
                    <p class="badge" style="background-color: red;color: #fff">KATEGORI AWAL</p>
                </td>
                <td><p class="badge" style="background-color: red;color: #fff"><?= $aduan->kategori ?></p></td>
                  <td>
                <p class="badge" style="background-color: grey;color: #fff"><?= date('d-m-Y', strtotime($aduan->tanggal)) ?></p>

            </td>
            </tr>
            <tr>
               <td>
                    <p class="badge" style="background-color: blue;color: #fff">KATEGORI DISESUAIKAN</p>
                </td>
                <td><p class="badge" style="background-color: blue;color: #fff"><?= $aduan->kategori_disesuaikan ?></p></td>
                 <td>
                <p class="badge" style="background-color: grey;color: #fff"><?= date('d-m-Y', strtotime($aduan->tanggal_disesuaikan)) ?></p>

            </td>
            </tr>
        <?php }else{ ?>
        <?php } ?>
</tr>
<tr>
    <td>
        <p class="badge" style="background-color: grey;color: #fff">ADUAN SEDANG DIPROSES PIMPINAN</p>
    </td>
    <td>
        <p class="badge" style="background-color: grey;color: #fff">ADUAN SUDAH TERKIRIM PADA PIMPINAN</p>
    </td>
    <td> 
                <p class="badge" style="background-color: grey;color: #fff"><?= date('d-m-Y', strtotime($aduan->proses2)) ?></p>

            </td>
</tr>
 <!-- 1 -->
<?php }elseif($aduan->verif == "PENGADUAN DITOLAK OLEH PIMPINAN"){ ?>
    <tr>
     <td><p class="badge" style="background-color: grey;color: #fff">ADUAN SEDANG DIVERIFIKASI PETUGAS</p></td>
     <td><p class="badge" style="background-color: grey;color: #fff">ADUAN DIPERIKSA</p></td>
                 <td>
               <p class="badge" style="background-color: grey;color: #fff"><?= date('d-m-Y', strtotime($aduan->tanggal)) ?></p>
            </td>
 </tr>
 <tr>
    <td><p class="badge" style="background-color: green;color: #fff">ADUAN DITERIMA PETUGAS</p></td>
    <td><p class="badge" style="background-color: green;color: #fff">ADUAN DITERIMA</p></td>
    <td>
                <p class="badge" style="background-color: grey;color: #fff"><?= date('d-m-Y', strtotime($aduan->proses1)) ?></p>

            </td>
</tr>
<tr>
    <?php if ($aduan->keterangan != null){ ?>
            <tr>
                <td></td>
                <td>
                    <p class="badge" style="background-color: blue;color: #fff"><?= $aduan->keterangan ?></p>
                </td>
                <td>
                <p class="badge" style="background-color: grey;color: #fff"><?= date('d-m-Y', strtotime($aduan->tanggal_disesuaikan)) ?></p>

            </td>
            </tr>
            <tr>
                <td>
                    <p class="badge" style="background-color: red;color: #fff">KATEGORI AWAL</p>
                </td>
                <td><p class="badge" style="background-color: red;color: #fff"><?= $aduan->kategori ?></p></td>
                  <td>
                <p class="badge" style="background-color: grey;color: #fff"><?= date('d-m-Y', strtotime($aduan->tanggal)) ?></p>

            </td>
            </tr>
            <tr>
               <td>
                    <p class="badge" style="background-color: blue;color: #fff">KATEGORI DISESUAIKAN</p>
                </td>
                <td><p class="badge" style="background-color: blue;color: #fff"><?= $aduan->kategori_disesuaikan ?></p></td>
                 <td>
                <p class="badge" style="background-color: grey;color: #fff"><?= date('d-m-Y', strtotime($aduan->tanggal_disesuaikan)) ?></p>

            </td>
            </tr>
        <?php }else{ ?>
        <?php } ?>
</tr>
<tr>
    <td><p class="badge" style="background-color: grey;color: #fff">ADUAN SEDANG DIPROSES PIMPINAN</p></td>
    <td><p class="badge" style="background-color: grey;color: #fff">ADUAN SUDAH TERKIRIM PADA PIMPINAN</p></td>
    <td>
                <p class="badge" style="background-color: grey;color: #fff"><?= date('d-m-Y', strtotime($aduan->proses2)) ?></p>

            </td>
</tr>
<tr>
    <td><p class="badge" style="background-color: red;color: #fff">ADUAN DITOLAK OLEH PIMPINAN</p></td>
    <?php if ($aduan->keterangan != null) { ?>
        <td><p class="badge" style="background-color: red;color: #fff">ADUAN DITOLAK</p></td>
    <?php }else{ ?>
        <td></td>
    <?php } ?>
</tr>

 <!-- 1 -->
<?php }elseif($aduan->verif == "PENGADUAN DITERIMA PIMPINAN"){ ?>
    <tr>
     <td><p class="badge" style="background-color: grey;color: #fff">ADUAN SEDANG DIVERIFIKASI PETUGAS</p></td>
     <td><p class="badge" style="background-color: grey;color: #fff">ADUAN DIPERIKSA</p></td>
                 <td>
               <p class="badge" style="background-color: grey;color: #fff"><?= date('d-m-Y', strtotime($aduan->tanggal)) ?></p>
            </td>
 </tr>
 <tr>
    <td><p class="badge" style="background-color: green;color: #fff">ADUAN DITERIMA PETUGAS</p></td>
    <td><p class="badge" style="background-color: green;color: #fff">ADUAN DITERIMA</p></td>
    <td>
                <p class="badge" style="background-color: grey;color: #fff"><?= date('d-m-Y', strtotime($aduan->proses1)) ?></p>

            </td>
</tr>
<tr>
   <?php if ($aduan->keterangan != null){ ?>
            <tr>
                <td></td>
                <td>
                    <p class="badge" style="background-color: blue;color: #fff"><?= $aduan->keterangan ?></p>
                </td>
                <td>
                <p class="badge" style="background-color: grey;color: #fff"><?= date('d-m-Y', strtotime($aduan->tanggal_disesuaikan)) ?></p>

            </td>
            </tr>
            <tr>
                <td>
                    <p class="badge" style="background-color: red;color: #fff">KATEGORI AWAL</p>
                </td>
                <td><p class="badge" style="background-color: red;color: #fff"><?= $aduan->kategori ?></p></td>
                  <td>
                <p class="badge" style="background-color: grey;color: #fff"><?= date('d-m-Y', strtotime($aduan->tanggal)) ?></p>

            </td>
            </tr>
            <tr>
               <td>
                    <p class="badge" style="background-color: blue;color: #fff">KATEGORI DISESUAIKAN</p>
                </td>
                <td><p class="badge" style="background-color: blue;color: #fff"><?= $aduan->kategori_disesuaikan ?></p></td>
                 <td>
                <p class="badge" style="background-color: grey;color: #fff"><?= date('d-m-Y', strtotime($aduan->tanggal_disesuaikan)) ?></p>

            </td>
            </tr>
        <?php }else{ ?>
        <?php } ?>
</tr>
<tr>
    <td><p class="badge" style="background-color: grey;color: #fff">ADUAN SEDANG DIPROSES PIMPINAN</p></td>
    <td><p class="badge" style="background-color: grey;color: #fff">ADUAN SUDAH TERKIRIM PADA PIMPINAN</p></td>
    <td>
                <p class="badge" style="background-color: grey;color: #fff"><?= date('d-m-Y', strtotime($aduan->proses2)) ?></p>

            </td>
</tr>
<tr>
    <td><p class="badge" style="background-color: grey;color: #fff">ADUAN DITERIMA OLEH PIMPINAN</p></td>
    <td><p class="badge" style="background-color: grey;color: #fff">ADUAN DIPROSES PIMPINAN</p></td>
    <td>
     <p class="badge" style="background-color: grey;color: #fff"><?= date('d-m-Y', strtotime($aduan->proses3)) ?></p>

            </td>
</tr>
<?php }elseif($aduan->verif == "PENGADUAN TELAH DITERIMA OLEH PIMPINAN"){ ?>
       <tr>
     <td><p class="badge" style="background-color: grey;color: #fff">ADUAN SEDANG DIVERIFIKASI PETUGAS</p></td>
     <td><p class="badge" style="background-color: grey;color: #fff">ADUAN DIPERIKSA</p></td>
                 <td>
               <p class="badge" style="background-color: grey;color: #fff"><?= date('d-m-Y', strtotime($aduan->tanggal)) ?></p>
            </td>
 </tr>
 <tr>
    <td><p class="badge" style="background-color: green;color: #fff">ADUAN DITERIMA PETUGAS</p></td>
    <td><p class="badge" style="background-color: green;color: #fff">ADUAN DITERIMA</p></td>
    <td>
                <p class="badge" style="background-color: grey;color: #fff"><?= date('d-m-Y', strtotime($aduan->proses1)) ?></p>

            </td>
</tr>
<tr>
   <?php if ($aduan->keterangan != null){ ?>
            <tr>
                <td></td>
                <td>
                    <p class="badge" style="background-color: blue;color: #fff"><?= $aduan->keterangan ?></p>
                </td>
                <td>
                <p class="badge" style="background-color: grey;color: #fff"><?= date('d-m-Y', strtotime($aduan->tanggal_disesuaikan)) ?></p>

            </td>
            </tr>
            <tr>
                <td>
                    <p class="badge" style="background-color: red;color: #fff">KATEGORI AWAL</p>
                </td>
                <td><p class="badge" style="background-color: red;color: #fff"><?= $aduan->kategori ?></p></td>
                  <td>
                <p class="badge" style="background-color: grey;color: #fff"><?= date('d-m-Y', strtotime($aduan->tanggal)) ?></p>

            </td>
            </tr>
            <tr>
               <td>
                    <p class="badge" style="background-color: blue;color: #fff">KATEGORI DISESUAIKAN</p>
                </td>
                <td><p class="badge" style="background-color: blue;color: #fff"><?= $aduan->kategori_disesuaikan ?></p></td>
                 <td>
                <p class="badge" style="background-color: grey;color: #fff"><?= date('d-m-Y', strtotime($aduan->tanggal_disesuaikan)) ?></p>

            </td>
            </tr>
        <?php }else{ ?>
        <?php } ?>
</tr>
<tr>
    <td><p class="badge" style="background-color: grey;color: #fff">ADUAN SEDANG DIPROSES PIMPINAN</p></td>
    <td><p class="badge" style="background-color: grey;color: #fff">ADUAN SUDAH TERKIRIM PADA PIMPINAN</p></td>
    <td>
                <p class="badge" style="background-color: grey;color: #fff"><?= date('d-m-Y', strtotime($aduan->proses2)) ?></p>

            </td>
</tr>
<tr>
    <td><p class="badge" style="background-color: grey;color: #fff">ADUAN DIPROSES PIMPINAN</p></td>
    <td><p class="badge" style="background-color: grey;color: #fff">ADUAN DIPROSES PIMPINAN</p></td>
    <td>
     <p class="badge" style="background-color: grey;color: #fff"><?= date('d-m-Y', strtotime($aduan->proses3)) ?></p>

            </td>
</tr>
<tr>
    <td><p class="badge" style="background-color: green;color: #fff">ADUAN DITERIMA OLEH PIMPINAN</p></td>
    <td><p class="badge" style="background-color: green;color: #fff">ADUAN DITERIMA OLEH PIMPINAN</p></td>
    <td>
     <p class="badge" style="background-color: grey;color: #fff"><?= date('d-m-Y', strtotime($aduan->proses3)) ?></p>

            </td>
</tr>
<?php } ?>
<?php } ?>
</tbody>
</table>
        </div>
    </div>
</div>

</div>
</div>

</div>
<!-- Bootstrap core JavaScript-->
<script src="<?= base_url() ?>assets/vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url() ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url() ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url() ?>assets/js/sb-admin-2.min.js"></script>
</body>
</html>
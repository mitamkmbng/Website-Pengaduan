<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Data Aduan Selesai Diproses</h1>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Tanggal</th>
              <th>Kategori</th>
              <th>Aduan</th>
              <th>Kontak Darurat</th>
              <th><center>File</center></th>
              <th>Status</th>
              <!-- Tambahkan kolom lain sesuai kebutuhan -->
            </tr>
          </thead>
          <tbody>
            <?php foreach ($aduan as $key) : ?>
              <tr>
                <td><?php echo date('d-m-Y', strtotime($key['tanggal'])) ?></td>
                <?php if ($key['kategori_disesuaikan'] != null){ ?>
                  <td><?= $key['kategori_disesuaikan'] ?></td>
                <?php }else{ ?>
                <td><?= $key['kategori'] ?></td>
              <?php } ?>
                <td><?= nl2br($key['aduan']) ?></td>
                <td><?= $key['kontak'] ?></td>
                <td><center>
                  <?php
                  $fileNames = explode(',', $key['file']);
                  foreach ($fileNames as $fileName) {
                    echo '<a href="' . base_url('petugas/downloadFile/') .$fileName .'" class="btn btn-warning mb-2"><i class="fas fa-download"></i></a> <a href="' . base_url('direktori/' . $fileName) . '" target="_blank" class="btn btn-primary mb-2"><i class="fas fa-fw fa-eye"></i></a><br>';
                  }
                  ?></center></td>
                  <!-- Tambahkan kolom lain sesuai kebutuhan -->
                  <?php if ($key['verif'] == "PENGADUAN TELAH DITERIMA OLEH PIMPINAN") {
                    $verif="Diterima";
                  }else{
                    $verif="Ditolak";
                  } ?>
                  <td><?= $verif ?></td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </table>
      </div>
    </div>
  </div>

</div>
        <!-- /.container-fluid -->
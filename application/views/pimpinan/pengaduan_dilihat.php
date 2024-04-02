<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Data Aduan Sudah Dilihat</h1>

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
              <th><center>File 2</center></th>
              <th>Aksi</th>
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
                <td><center><a href="<?= base_url('pimpinan/downloadFile/') . $key['id']; ?>" class="btn btn-warning"><i class="fas fa-download"></i></a> <a href="<?= base_url('direktori/'.$key['file']) ?>" class="btn btn-primary" target="_blank"><i class="fas fa-fw fa-eye"></i></a></center></td>
                <td><center><a href="<?= base_url('pimpinan/downloadFile2/') . $key['id']; ?>" class="btn btn-warning"><i class="fas fa-download"></i></a> <a href="<?= base_url('direktori/'.$key['file2']) ?>" class="btn btn-primary" target="_blank"><i class="fas fa-fw fa-eye"></i></a></center></td>
                <td>
                  <a href="" class="btn btn-primary" data-toggle="modal" data-target="#Verifikasi<?= $key['id'];?>">Update</a>
                </td>
                <!-- Tambahkan kolom lain sesuai kebutuhan -->
              </tr>
              <div class="modal fade" id="Verifikasi<?= $key['id']; ?>" tabindex="-1" aria-labelledby="VeirivikasiLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="EditKriteriaLabel">Verifikasi Aduan</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <form action="<?= base_url('pimpinan/Proses'); ?>" method="post">
                      <div class="modal-body">
                        <input type="hidden" name="id" id="id" value="<?= $key['id'] ?>">
                        <div class="form-group">
                          <label for="Nomor">Nomor Aduan</label>
                          <input type="text" readonly="" name="nomor" class="form-control" id="nomor" placeholder="" value="<?= $key['nomor']; ?>">
                        </div>
                        <div class="form-group">
                          <label for="Nomor">Tanggal Aduan</label>
                          <input type="text" readonly="" name="tanggal" class="form-control" id="tanggal" placeholder="" value="<?= $key['tanggal']; ?>">
                        </div>
                        <div class="form-group">
                          <label for="Subjek">Kategori</label>
                          <input type="text" readonly="" name="kategori" class="form-control" id="kategori" placeholder="" value="<?= $key['kategori']; ?>">
                        </div>

                        <input type="hidden" name="aduan" id="aduan" value="<?= $key['aduan'] ?>">
                        <div class="form-group">
                          <label for="Nomor">Lanjutkan Proses</label>
                          <select name="verif" id="verif" class="form-control">
                            <option value="">-Proses Aduan-</option>
                            <option value="PENGADUAN TELAH DITERIMA OLEH PIMPINAN">Terima Laporan</option>
                            <option value="PENGADUAN DITOLAK OLEH PIMPINAN">Tolak Laporan</option>
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="Subjek">Keterangan</label>
                          <textarea name="keterangan" class="form-control" id="" cols="30" rows="5"></textarea>
                        </div>         
                      </div>
                      <div class="modal-footer">
                        <button type="button" data-dismiss ="modal" class="btn btn-secondary">Tutup</button>
                        <button type="submit" class="btn btn-primary">Ubah</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>  
            <?php endforeach; ?>
          </tbody>
        </table>
      </table>
    </div>
  </div>
</div>

</div>
        <!-- /.container-fluid -->
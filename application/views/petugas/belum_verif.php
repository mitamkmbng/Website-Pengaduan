<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Data Aduan Belum diverifikasi</h1>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>

              <th>No</th>
              <th>Tanggal</th>
              <th>kategori</th>
              <th>Aduan</th>
              <th><center>Berkas</center></th>
              <th><center>Aksi</center></th>

            </tr>
          </thead>
          <tbody>
            <?php $i = 1; ?>
            <?php 

            foreach ($aduan as $aduan):
              ?>
              <tr>
                <td><?= $i; ?></td>
                <td><?= date('d-m-Y', strtotime($aduan['tanggal'])) ?></td>
                <?php if ($aduan['kategori_disesuaikan'] != null){ ?>
                  <td><?= $aduan['kategori_disesuaikan'] ?></td>
                <?php }else{ ?>
                <td><?= $aduan['kategori'] ?></td>
              <?php } ?>
                <td><?= nl2br($aduan['aduan']) ?></td>
                <td><center>
                  <?php
                  $fileNames = explode(',', $aduan['file']);
                  foreach ($fileNames as $fileName) {
                    echo '<a href="' . base_url('petugas/downloadFile/') .$fileName .'" class="btn btn-warning mb-2"><i class="fas fa-download"></i></a> <a href="' . base_url('direktori/' . $fileName) . '" target="_blank" class="btn btn-primary mb-2"><i class="fas fa-fw fa-eye"></i></a><br>';
                  }
                  ?></center></td>
<!--                   <?php if ($aduan['file2'] != null){ ?>
                    <td><center><a href="<?= base_url('petugas/downloadFile2/') . $aduan['id']; ?>" class="btn btn-warning"><i class="fas fa-download"></i></a> <a href="<?= base_url('direktori/'.$aduan['file2']) ?>" target="_blank" class="btn btn-primary"><i class="fas fa-fw fa-eye"></i></a></center></td>
                  <?php }else{ ?>
                    <td><p><center>Tidak Ditemukan</center></p></td>
                  <?php   } ?> -->
                  <td>

                    <center>
                      <a href="" class="btn btn-success" data-toggle="modal" data-target="#edit<?= $aduan['id'];?>">Ubah</a>
                      <a href="" class="btn btn-primary" data-toggle="modal" data-target="#Verifikasi<?= $aduan['id'];?>">Verifikasi</a>
                      <a href="<?= base_url('petugas/hapusPengaduan/') . $aduan['id']; ?>" class="btn btn-danger hapus-data">Hapus</a>
                      <div class="modal fade" id="edit<?= $aduan['id']; ?>" tabindex="-1" aria-labelledby="VeirivikasiLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="EditKriteriaLabel">Ubah Kategori</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <form action="<?= base_url('petugas/ubahKategori'); ?>" method="post">
                              <div class="modal-body">
                                <input type="hidden" name="id" id="id" value="<?= $aduan['id'] ?>">
                                <div class="form-group">
                                  <label for="Nomor">Nomor Aduan</label>
                                  <input type="text" readonly="" name="nomor" class="form-control" id="nomor" placeholder="" value="<?= $aduan['nomor']; ?>">
                                </div>
                                <div class="form-group">
                                  <label for="Nomor">Tanggal Aduan</label>
                                  <input type="text" readonly="" name="tanggal" class="form-control" id="tanggal" placeholder="" value="<?= $aduan['tanggal']; ?>">
                                </div>
                                <div class="form-group">
                                  <label for="Subjek">Kategori</label>
                                  <select name="kategori" class="form-control" id="">
                                    <option value="<?= $aduan['kategori'] ?>">Kategori : <?= $aduan['kategori'] ?></option>
                                    <option value="Gratifikasi Suap">Gratifikasi Suap</option>
                                    <option value="Pungutan Liar/Pungli">Pungutan Liar/Pungli</option>
                                    <option value="Pelecehan Seksual">Pelecehan Seksual</option>
                                    <option value="Kekerasan Fisik/Non Fisik">Kekerasan Fisik/Non Fisik</option>
                                    <option value="Narkoba">Narkoba</option>
                                    <option value="Radikalisme/Terorisme">Radikalisme/Terorisme</option>
                                    <option value="Usulan Pengembangan">Usulan Pengembangan</option>
                                    <option value="Kerusakan Fasilitas">Kerusakan Fasilitas</option>
                                    <option value="Ketidakpuasan Layanan">Ketidakpuasan Layanan</option>
                                  </select>
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
                    </center></td>
                  </tr>
                  <?php $i++; ?>  
                <?php endforeach ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>

    </div>
    <!-- /.container-fluid -->


    <!-- MODAL -->
    <?php foreach ($pengaduan as $aduan) : ?>
      <div class="modal fade" id="Verifikasi<?= $aduan['id']; ?>" tabindex="-1" aria-labelledby="VeirivikasiLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="EditKriteriaLabel">Verifikasi Aduan</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="<?= base_url('petugas/verifikasi'); ?>" method="post">
              <div class="modal-body">
                <div class="form-group">
                  <label for="Nomor">Nomor Aduan</label>
                  <input type="hidden" name="id" id="id" value="<?= $aduan['id'] ?>">
                  <input type="text" readonly="" name="nomor" class="form-control" id="id" placeholder="" value="<?= $aduan['nomor']; ?>">
                </div>
                <div class="form-group">
                  <label for="Nomor">Tanggal Aduan</label>
                  <input type="text" readonly="" name="tanggal" class="form-control" id="tanggal" placeholder="" value="<?= $aduan['tanggal']; ?>">
                </div>
                <div class="form-group">
                  <label for="Subjek">Kategori</label>
                  <input type="text" readonly="" name="kategori" class="form-control" id="kategori" placeholder="" value="<?= $aduan['kategori']; ?>">
                </div>
                <input type="hidden" name="aduan" id="aduan" value="<?= $aduan['aduan'] ?>">
                <div class="form-group">
                  <label for="Nomor">Verifikasi Aduan</label>
                  <select name="verif" id="verif" class="form-control" required oninvalid="this.setCustomValidity('Verifikasi Aduan Terlebih Dahulu')" oninput="setCustomValidity('')">
                    <option value="">-Verifikasi Aduan-</option>
                    <option value="PENGADUAN DITERIMA PETUGAS">Terima Aduan</option>
                    <option value="PENGADUAN DITOLAK PETUGAS">Tolak Aduan</option>
                  </select>
                </div> 
                <div class="form-group">
                  <label for="Subjek">Keterangan</label>
                  <textarea name="keterangan" class="form-control" id="" cols="30" rows="5"><?= $aduan['keterangan']; ?></textarea>
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
      <?php endforeach ?>

<!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Data Petugas</h1>
          <?php if ($this->session->flashdata('msg')) : ?>
           <div class="alert alert-success alert-dismissible fade show" role="alert">
            Petugas<strong> Berhasil <?= $this->session->flashdata('msg'); ?> </strong> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div> 
        <?php endif; ?>
          <?php if(validation_errors()) : ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
               <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              <?= validation_errors();  ?>
            </div>
          <?php endif; ?>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
            	<button class="btn btn-primary" data-toggle="modal" data-target="#TambahPetugas">Tambah Petugas</button>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama</th>
                      <th>Username</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                  	<?php $i = 1; ?>
                    <?php 
                    foreach ($petugas as $petugas):
                    ?>
                    <tr>
                      <td><?= $i ?></td>
                      <td><?= $petugas['nama'] ?></td>
                      <td><?= $petugas['username'] ?></td>
                      <td>
                        <center>
                          <a href="" class="btn btn-primary" data-toggle="modal" data-target="#Edit<?= $petugas['id'];?>">Ubah</a>
                          <a href="<?= base_url('pimpinan/hapusPetugas/') . $petugas['id']; ?>" class="btn btn-danger" onclick="return confirm ('Hapus Aduan ? ');">Hapus</a>
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
      <div class="modal fade" id="TambahPetugas" tabindex="-1" aria-labelledby="VeirivikasiLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="EditKriteriaLabel">Tambah Petugas</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="<?= base_url('pimpinan/tambahPetugas'); ?>" method="post">
          <div class="modal-body">
            <div class="form-group">
              <label for="Nomor">Nama Petugas</label>
              <input type="text" name="nama" class="form-control" id="nama" placeholder="">
            </div>
            <div class="form-group">
              <label for="Nomor">Username</label>
              <input type="text" name="username" class="form-control" id="username">
            </div>
            <div class="form-group">
              <label for="Subjek">Password</label>
              <input type="password" name="password" class="form-control" id="password">
            </div>
            </div>
            <div class="modal-footer">
              <button type="button" data-dismiss ="modal" class="btn btn-secondary">Tutup</button>
              <button type="submit" class="btn btn-primary">Tambahkan</button>
            </div>
          </form>
        </div>
      </div>
    </div>  

    <!-- MODAL -->
    <?php foreach ($user as $user) : ?>
      <div class="modal fade" id="Edit<?= $user['id'] ?>" tabindex="-1" aria-labelledby="VeirivikasiLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="EditKriteriaLabel">Ubah Data Petugas</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="<?= base_url('pimpinan/editPetugas'); ?>" method="post">
          <div class="modal-body">
            <div class="form-group">
              <label for="Nomor">Nama Petugas</label>
              <input type="hidden" name="id" class="form-control" id="id" value="<?= $user['id'] ?>" placeholder="">
              <input type="text" name="nama" class="form-control" id="nama" value="<?= $user['nama'] ?>" placeholder="">
            </div>
            <div class="form-group">
              <label for="Nomor">Username</label>
              <input type="text" name="username" class="form-control" id="username" value="<?= $user['username'] ?>">
            </div>
            <div class="form-group">
              <label for="Subjek">Password</label>
              <input type="password" name="password" class="form-control" id="password" placeholder="kosongkan jika tidak diganti">
            </div>   
            <input type="hidden" name="role" id="role" value="<?= $user['role'] ?>">
            </div>
            <div class="modal-footer">
              <button type="button" data-dismiss ="modal" class="btn btn-secondary">Tutup</button>
              <button type="submit" class="btn btn-primary">Tambahkan</button>
            </div>
          </form>
        </div>
      </div>
    </div>  
    <?php endforeach ?>
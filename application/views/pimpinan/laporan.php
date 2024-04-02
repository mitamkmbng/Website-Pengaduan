<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Data Aduan</h1>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <form id="filterForm" action="<?= base_url('pimpinan/filterDataByDate') ?>" method="post">
        <label for="">Dari Tanggal</label>
        <input type="date" id="start_date" name="start_date" required>
        <label for="">Sampai Tanggal</label>
        <input type="date" id="end_date" name="end_date" required>
        <button type="submit">Filter</button>
      </form>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <?php if (isset($filtered_data)): ?>
            <thead>
              <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Kategori</th>
                <th>Aduan</th>
                <th>Kontak Darurat</th>
                <th>Status</th>
                <th>Keterangan</th>
                <th>File</th>
              </tr>
            </thead>
            <tbody>
              <?php $i=1; foreach ($filtered_data as $row) : ?>
              <tr>
                <td><?= $i++ ?></td>
                <td><?php echo date('d/m/y', strtotime($row->tanggal)) ?></td>
                <?php if ($row->kategori_disesuaikan != null){ ?>
                  <td><?= $row->kategori_disesuaikan ?></td>
                <?php }else{ ?>
                <td><?= $row->kategori ?></td>
              <?php } ?>
                <td><?= nl2br($row->aduan) ?></td>
                <td><?= $row->kontak?></td>
                <td><?= $row->verif ?></td>
                <td><?= $row->keterangan ?></td>
                <td><center>
                  <?php
                  $fileNames = explode(',', $row->file);
                  foreach ($fileNames as $fileName) {
                    echo '<a href="' . base_url('pimpinan/downloadFile/') .$fileName .'" class="btn btn-warning mb-2"><i class="fas fa-download"></i></a> <a href="' . base_url('direktori/' . $fileName) . '" target="_blank" class="btn btn-primary mb-2"><i class="fas fa-fw fa-eye"></i></a><br>';
                  }
                  ?></center></td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        <?php endif; ?>
      </table>
    </div>
  </div>
</div>

<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Data Aduan Masuk</h6>
  </div>
  <div class="card-body">
    <div style="width: 100%;margin: 0px auto;">
      <canvas id="myChart1"></canvas>
    </div>
  </div>
</div>
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Data Laporan Pengaduan</h6>
  </div>
  <div class="card-body">
    <div style="width: 100%;margin: 0px auto;">
      <canvas id="myChart"></canvas>
    </div>
  </div>
</div>

</div>
</div>
<!-- Footer -->
<footer class="sticky-footer bg-white">
  <div class="container my-auto">
    <div class="copyright text-center my-auto">
      <span>Copyright <?= date('Y') ?></span>
    </div>
  </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
  <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Keluar</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">Apakah Anda Ingin Keluar ?</div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
        <a class="btn btn-primary" href="<?= base_url('auth/logout') ?>">Keluar</a>
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
<!-- Page level plugins -->
<script src="<?= base_url() ?>assets/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>
<!-- Page level custom scripts -->
<script src="<?= base_url() ?>assets/js/demo/datatables-demo.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- Page level plugins -->
<script src="<?= base_url() ?>assets/vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="<?= base_url() ?>assets/js/demo/chart-area-demo.js"></script>
<script src="<?= base_url() ?>assets/js/demo/chart-pie-demo.js"></script>
<script src="<?= base_url() ?>assets/js/demo/chart-bar-demo.js"></script>
<?php if ($this->session->flashdata('berhasil')): ?>
  <script src="<?php echo base_url('assets/sweetalert/sweet-alert.min.js'); ?>"></script>
  <script>
    $(document).ready(function() {
      Swal.fire({
        icon: 'success',
        title: '<?php echo $this->session->flashdata('berhasil'); ?>',
        text: 'Simpan Nomor Untuk Cek Aduan',
      });
    });
  </script>
<?php endif; ?>

<?php if ($this->session->flashdata('error')): ?>
  <script src="<?php echo base_url('assets/sweetalert/sweet-alert.min.js'); ?>"></script>
  <script>
    $(document).ready(function() {
      Swal.fire({
        icon: 'error',
        title: 'Maaf, aduan gagal. ',
        text: '<?php echo $this->session->flashdata('error'); ?>',
      });
    });
  </script>
<?php endif; ?>

<?php if ($this->session->flashdata('berhasil')): ?>
  <script src="<?php echo base_url('assets/sweetalert/sweet-alert.min.js'); ?>"></script>
  <script>
    $(document).ready(function() {
      Swal.fire({
        icon: 'success',
        title: '<?php echo $this->session->flashdata('berhasil'); ?>',
        text: 'Simpan Nomor Untuk Cek Aduan',
      });
    });
  </script>
<?php endif; ?>

<?php if ($this->session->flashdata('msg')): ?>
  <script src="<?php echo base_url('assets/sweetalert/sweet-alert.min.js'); ?>"></script>
  <script>
    $(document).ready(function() {
      Swal.fire({
        icon: 'success',
        title: '<?php echo $this->session->flashdata('msg'); ?>',
        text: '',
        timer: 2000,
        showConfirmButton: false,
      });
    });
  </script>
<?php endif; ?>

<script>
  window.onload = function() {
    var tanggalInput = document.getElementById('tgl');
    var currentDate = new Date();
    var year = currentDate.getFullYear();
    var month = ("0" + (currentDate.getMonth() + 1)).slice(-2);
    var day = ("0" + currentDate.getDate()).slice(-2);
    var formattedDate = year + "-" + month + "-" + day;
    tanggalInput.value = formattedDate;
  }
</script>

<!-- <script>
    $(document).ready(function() {
        // Handle klik tombol logout
        $('#logoutBtn').on('click', function() {
            Swal.fire({
                title: 'Konfirmasi Logout',
                text: 'Apakah Anda yakin ingin logout?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Logout'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Redirect ke halaman logout jika konfirmasi diterima
                    window.location.href = '<?php echo site_url("auth/logout"); ?>';
                }
            });
        });
    });
  </script> -->

  <script src="<?php echo base_url('assets/sweetalert/sweetalert.min.js'); ?>"></script>
  <script>
    $(document).on('click', '.hapus-data', function(e) {
      e.preventDefault();
      var url = $(this).attr('href');

      Swal.fire({
        title: 'Konfirmasi',
        text: 'Apakah Anda yakin ingin menghapus data ini?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, hapus',
        cancelButtonText: 'Batal'
      }).then((result) => {
        if (result.isConfirmed) {
        // Redirect to the delete URL
        window.location.href = url;
      }
    });
    });
  </script>

  <script>
    $(document).on('click', '.logout', function(e) {
      e.preventDefault();
      var url = '<?= base_url('auth/logout'); ?>';

      Swal.fire({
        title: 'Konfirmasi Keluar',
        text: 'Apakah Anda yakin ingin keluar?',
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya',
        cancelButtonText: 'Batal'
      }).then((result) => {
        if (result.isConfirmed) {
        // Redirect to the logout URL
        window.location.href = url;
      }
    });
    });
  </script>
<?php 
  $hsuap = $suap->num_rows();
  $hpungli = $pungli->num_rows();
  $hpelecehan = $pelecehan->num_rows();
  $hkekerasan = $kekerasan->num_rows();
  $hnarkoba = $narkoba->num_rows();
  $hradikalisme = $radikalisme->num_rows();
  $hpengembangan = $pengembangan->num_rows();
  $hkerusakan = $kerusakan->num_rows();
  $hlayanan = $layanan->num_rows();
 ?>
   <?php 
$hsuap = $suap->num_rows();
$hpungli = $pungli->num_rows();
$hpelecehan = $pelecehan->num_rows();
$hkekerasan = $kekerasan->num_rows();
$hnarkoba = $narkoba->num_rows();
$hradikalisme = $radikalisme->num_rows();
$hpengembangan = $pengembangan->num_rows();
$hkerusakan = $kerusakan->num_rows();
$hlayanan = $layanan->num_rows();
?>
<script>
  var ctx = document.getElementById("myChart").getContext('2d');
  var myChart = new Chart(ctx, {
    type: 'doughnut',
    data: {
      labels: ["Gratifikasi Suap : <?=  $hsuap ?>", "Pungutan Liar/Pungli : <?= $hpungli?>", "Pelecehan Seksual : <?=  $hpelecehan ?>","Kekerasan Fisik/Non Fisik : <?=  $hkekerasan ?>","Narkoba : <?=  $hnarkoba ?>","Radikalisme/Terorisme : <?=  $hradikalisme ?>","Usulan Pengembangan : <?=  $hpengembangan ?>","Kerusakan Fasilitas : <?=  $hkerusakan ?>","Ketidakpuasan Layanan : <?=  $hlayanan ?>"],
      datasets: [{
        label: 'Aduan Masuk Berdasarkan Kategori',
        data: [
          <?= $suap->num_rows() ?>,
          <?= $pungli->num_rows() ?>,
          <?= $pelecehan->num_rows() ?>,
          <?= $kekerasan->num_rows() ?>,
          <?= $narkoba->num_rows() ?>,
          <?= $radikalisme->num_rows() ?>,
          <?= $pengembangan->num_rows() ?>,
          <?= $kerusakan->num_rows() ?>,
          <?= $layanan->num_rows() ?>
        ],
        backgroundColor: ["#F4D03F", "#E74C3C", "#8E44AD", "#3498DB", "#1ABC9C", "#E67E22", "#27AE60", "#D35400", "#BDC3C7"],
        hoverBackgroundColor: ["#F7DC6F", "#EC7063", "#9B59B6", "#5DADE2", "#48C9B0", "#EB984E", "#2ECC71", "#E67E22", "#D7DBDD"]
      }]
    },
    options: {
      responsive: true,
      tooltips: {
        callbacks: {
          label: function(tooltipItem, data) {
            return data.labels[tooltipItem.index];
          }
        }
      }
    }
  });
</script>
  <script>
    var ctx = document.getElementById("myChart1").getContext('2d');
    var myChart = new Chart(ctx, {
      type: 'pie',
      data: {
        labels: ["Aduan Diterima", "Aduan Ditolak"],
        datasets: [{
          label: 'Aduan Masuk Berdasarkan Kategori',
          data: [
          <?php 
          $diterima = $diterima;
          echo $diterima->num_rows();
          ?>,    
          <?php 
          $ditolak = $ditolak;
          echo $ditolak->num_rows();
          ?>, 
          ],
          backgroundColor: ["#4CAF50", "#F44336"],
          hoverBackgroundColor: ["#81C784", "#EF5350"]
        }]
      },
      options: {
        responsive: true
      }
    });
  </script>
</body>

</html>

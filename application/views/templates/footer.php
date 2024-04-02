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
        <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Logout</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">Apakah Anda Ingin Logout ?</div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
        <a class="btn btn-primary" href="<?= base_url('auth/logout') ?>">Logout</a>
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
        title: 'Konfirmasi Logout',
        text: 'Apakah Anda yakin ingin logout?',
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
<!-- <?php 
  $kategoriData= array(
   array("label" => "Gratifikasi Suap", "jumlah" => $this->db->query("select * from pengaduan where kategori='Gratifikasi Suap'")->num_rows()),
   array("label" => "Pungutan Liar/Pungli", "jumlah" => $this->db->query("select * from pengaduan where kategori='Pungutan Liar/Pungli'")->num_rows()),
   array("label" => "Pelecehan Seksual", "jumlah" => $this->db->query("select * from pengaduan where kategori='Pelecehan Seksual'")->num_rows()),
   array("label" => "Kekerasan Fisik/Non Fisik", "jumlah" => $this->db->query("select * from pengaduan where kategori='Kekerasan Fisik/Non Fisik'")->num_rows()),
   array("label" => "Narkoba", "jumlah" => $this->db->query("select * from pengaduan where kategori='Narkoba'")->num_rows()),
   array("label" => "Radikalisme/Terorisme", "jumlah" => $this->db->query("select * from pengaduan where kategori='Radikalisme/Terorisme'")->num_rows()),
   array("label" => "Usulan Pengembangan", "jumlah" => $this->db->query("select * from pengaduan where kategori='Usulan Pengembangan'")->num_rows()),
   array("label" => "Kerusakan Fasilitas", "jumlah" => $this->db->query("select * from pengaduan where kategori='Kerusakan Fasilitas'")->num_rows()),
   array("label" => "Ketidakpuasan Layanan", "jumlah" => $this->db->query("select * from pengaduan where kategori='Ketidakpuasan Layanan'")->num_rows()),
);
 ?> -->
  <script>
    var ctx = document.getElementById("myChart").getContext('2d');
    var myChart = new Chart(ctx, {
      type: 'doughnut',
      data: {
        labels: kategoriData.map(data => data.label),
        datasets: [{
          label: 'Aduan Masuk Berdasarkan Kategori',
          data: [
          <?php 
          $suap = $this->db->query("select * from pengaduan where kategori='Gratifikasi Suap'");
          echo $suap->num_rows();
          ?>,
          <?php 
          $pungli = $this->db->query("select * from pengaduan where kategori='Pungutan Liar/Pungli'");
          echo $pungli->num_rows();
          ?>,    
          <?php 
          $pelecehan = $this->db->query("select * from pengaduan where kategori='Pelecehan Seksual'");
          echo $pelecehan->num_rows();
          ?>, 
          <?php 
          $kekerasan = $this->db->query("select * from pengaduan where kategori='Kekerasan Fisik/Non Fisik'");
          echo $kekerasan->num_rows();
          ?>,
          <?php 
          $narkoba = $this->db->query("select * from pengaduan where kategori='Narkoba'");
          echo $narkoba->num_rows();
          ?>,
          <?php 
          $radikaslisme = $this->db->query("select * from pengaduan where kategori='Radikalisme/Terorisme'");
          echo $radikaslisme->num_rows();
          ?>,
          <?php 
          $pengembangan = $this->db->query("select * from pengaduan where kategori='Usulan Pengembangan'");
          echo $pengembangan->num_rows();
          ?>,
          <?php 
          $kerusakan = $this->db->query("select * from pengaduan where kategori='Kerusakan Fasilitas'");
          echo $kerusakan->num_rows();
          ?>,
          <?php 
          $layanan = $this->db->query("select * from pengaduan where kategori='Ketidakpuasan Layanan'");
          echo $layanan->num_rows();
          ?>,
          ],
          backgroundColor: ["#F4D03F", "#E74C3C", "#8E44AD", "#3498DB", "#1ABC9C", "#E67E22", "#27AE60", "#D35400", "#BDC3C7"],
        hoverBackgroundColor: ["#F7DC6F", "#EC7063", "#9B59B6", "#5DADE2", "#48C9B0", "#EB984E", "#2ECC71", "#E67E22", "#D7DBDD"]
        }]
      },
      options: {
        responsive: true
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
          $pungli = $this->db->query("select * from pengaduan where verif='PENGADUAN TELAH DITERIMA OLEH PIMPINAN'");
          echo $pungli->num_rows();
          ?>,    
          <?php 
          $pelecehan = $this->db->query("select * from pengaduan where verif='PENGADUAN DITOLAK PETUGAS' or verif='PENGADUAN DITOLAK OLEH PIMPINAN'");
          echo $pelecehan->num_rows();
          ?>, 
          <?php 
          $kekerasan = $this->db->query("select * from pengaduan where kategori='Kekerasan Fisik/Non Fisik'");
          echo $kekerasan->num_rows();
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

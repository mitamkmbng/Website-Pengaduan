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
  <div class="container col-lg-5">
    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <div class="row">
          <div class="col-lg">
            <div class="p-5">
              <form action="<?php echo site_url('aduan/checkCaptcha'); ?>" method="post">
                <img src="<?= base_url() ?>assets/img/mark4.png" width="300px">
                <h3><?php echo $captcha['question']; ?></h3>
                <div class="form-group">
                  <?php
                  $answers = array_merge([$captcha['answers']['correct']], $captcha['answers']['wrong']);
                  shuffle($answers);

                  foreach ($answers as $answer) {
                    ?>
                    <label>
                      <input type="radio" name="answer" value="<?php echo $answer; ?>">
                      <?php echo $answer; ?>
                    </label>
                    <br>
                  <?php } ?>
                </div>
                <button class="btn btn-primary" type="submit">Submit</button>
              </form>
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
  <!-- Page level plugins -->
  <script src="<?= base_url() ?>assets/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="<?= base_url() ?>assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>
  <script src="<?php echo base_url('assets/sweetalert/sweet-alert.min.js'); ?>"></script>

  <!-- Page level custom scripts -->
  <script src="<?= base_url() ?>assets/js/demo/datatables-demo.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <?php if ($this->session->flashdata('error')): ?>
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

  <?php if ($this->session->flashdata('salah')): ?>
    <script>
      $(document).ready(function() {
        Swal.fire({
          icon: 'error',
          title: '<?php echo $this->session->flashdata('salah'); ?>',
          text: 'Silahkan Jawab Pertanyaan Lain',
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
</body>

</html>

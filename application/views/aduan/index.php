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
<body class="mahasiswa gambar">
  <div class="container">
    <center>
      <landing>Selamat Datang di <br>Website Layanan Pengaduan Prodi TI</landing>
      <h1></h1>
      <a href="<?= base_url('aduan/Captcha') ?>" class="btn btn-danger">Buat Aduan</a>
      <a href="<?= base_url('aduan/cekAduan') ?>" class="btn btn-primary">Cek Aduan</a>
    </center>
  </div>
  <!-- Bootstrap core JavaScript-->
  <script src="<?= base_url() ?>assets/vendor/jquery/jquery.min.js"></script>
  <script src="<?= base_url() ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?= base_url() ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?= base_url() ?>assets/js/sb-admin-2.min.js"></script>
  <script src="<?= base_url() ?>assets/js/jspdf.js"></script>
  <script src="<?= base_url() ?>assets/js/FileSaver.js"></script>
  <!-- Page level plugins -->
  <script src="<?= base_url() ?>assets/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="<?= base_url() ?>assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.3/jspdf.umd.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.5/FileSaver.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="<?= base_url() ?>assets/js/demo/datatables-demo.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
<!-- 
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
-->
<?php if ($this->session->flashdata('berhasil')): ?>
  <script src="<?php echo base_url('assets/sweetalert/sweet-alert.min.js'); ?>"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.3/html2pdf.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.70/pdfmake.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.70/vfs_fonts.js"></script>
  <style>
  .pdf-content {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    text-align: center;
    font-size: 40px;
  }
</style>
<script>
  $(document).ready(function() {
    Swal.fire({
      icon: 'success',
      title: '<?php echo $this->session->flashdata('berhasil'); ?>',
      text: 'Simpan Nomor Untuk Cek Aduan',
      showCancelButton: false,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'OK'
    }).then((result) => {
      if (result.isConfirmed) {
          // Generate and download PDF file
         // Generate and download PDF file
          var textToPrint = '<?php echo $this->session->flashdata('berhasil'); ?>'; // Teks yang akan dicetak

          // Create the PDF document definition
          var docDefinition = {
            content: [
            { 
              text: textToPrint,
              fontSize: 30,
              alignment: 'center' 
            }
            ]
          };

          // Generate the PDF
          var pdfDocGenerator = pdfMake.createPdf(docDefinition);
          pdfDocGenerator.download('Nomor Aduan.pdf');
        }
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


</body>

</html>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title><?= $judul ?></title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
<!--   <link href="assets/img/logoit.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon"> -->

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Appland
  * Updated: Jul 27 2023 with Bootstrap v5.3.1
  * Template URL: https://bootstrapmade.com/free-bootstrap-app-landing-page-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top  header-transparent ">
    <div class="container d-flex align-items-center justify-content-between">

      <div class="logo">
        <!-- <h1><a href="index.html">Appland</a></h1> -->
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Beranda</a></li>
          <li><a class="nav-link scrollto" href="#features">Profil</a></li>
          <li><a class="nav-link scrollto" href="<?= base_url('auth') ?>">Masuk</a></li>
          <li><a class="getstarted scrollto" href="<?= base_url('aduan/Captcha') ?>">Buat Aduan</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">

    <div class="container">
      <div class="row">
        <div class="col-lg-6 d-lg-flex flex-lg-column justify-content-center align-items-stretch pt-5 pt-lg-0 order-2 order-lg-1" data-aos="fade-up">
          <div>
            <h1>Selamat Datang</h1>
            <h2>di Website Layanan Pengaduan Prodi TI</h2>
            <a href="<?= base_url('aduan/Captcha') ?>" class="download-btn" onclick="return confirm ('Sebelum Membuat Aduan Anda Harus Menjawab Pertanyaan Berikut')"><i class="bx bx-plus-circle"></i> Buat Aduan</a>
            <a href="<?= base_url('aduan/cekAduan') ?>" class="download-btn"><i class="bx bx-search"></i> Lihat Aduan</a>
          </div>
        </div>
        <div class="col-lg-6 d-lg-flex flex-lg-column align-items-stretch order-1 order-lg-2 hero-img" data-aos="fade-up">
        <img src="<?php echo base_url() ?>/assets/img/desain.png" width="1650px" height="600px" class="img-fluid">

        </div>
      </div>
    </div>

  </section><!-- End Hero -->

      <!-- ======= App Features Section ======= -->
    <section id="features" class="features">
      <div class="container">

        <div class="section-title">
          <h2>Profil Program Studi Teknik Informatika</h2>
          <p>Teknik Informatika merupakan salah satu Program Studi di Universitas Negeri Manado.</p>
        </div>

        <div class="row no-gutters">
          <div class="col-xl-7 d-flex align-items-stretch order-2 order-lg-1">
            <div class="content d-flex flex-column justify-content-center">
              <div class="row">
                <div class="col-md-6 icon-box" data-aos="fade-up">
                 
                  <h4>Alamat</h4>
                  <p>Fakultas Teknik, Universitas Negeri Manado</p>
                  <p>Kampus UNIMA, Tonsaru - Kec. Tondano Selatan, Kab. Minahasa</p>
                </div>

                </div>
                <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="200">
                  <i class=""></i>
                  <h4>Kontak</h4>
                  <p>Email : teknikinfomartika@unima.ac.id</p>
                  <p>Telp  : (0431)7233580</p>
                </div>
                 <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="100">
                  <h4>Tentang Kami</h4>
                  <p><a href="https://ti.unima.ac.id/">Kunjungi Teknik Informatika</a></p>
                  <p><a href="https://www.youtube.com/@informatikaftunima6429">Kunjungi Teknik Informatika</a></p>
              </div>
            </div>
          </div>
          <div class="image col-xl-5 d-flex align-items-stretch justify-content-center order-1 order-lg-2" data-aos="fade-left" data-aos-delay="100">
        <img src="<?php echo base_url() ?>/assets/img/testing.jpg" width="1650px" height="600px" class="img-fluid">
          </div>
        </div>

      </div>
    </section><!-- End App Features Section -->

  <main id="main">
   <section id="features" class="features">
    <div class="container">

      <div class="section-title">
        <h2>Data Kategori Aduan</h2>
      </div>
      <canvas id="myChart3"></canvas>


    </div>
  </section><!-- End App Features Section -->
</main><!-- End #main -->

<!-- ======= Footer ======= -->
<footer id="footer">

  <div class="container py-4">
    <div class="copyright">
      &copy; Copyright <strong><?= date('Y') ?></strong>. All Rights Reserved
    </div>
  </div>
</footer><!-- End Footer -->

<!-- Vendor JS Files -->
<script src="<?= base_url() ?>assets/vendor/aos/aos.js"></script>
<script src="<?= base_url() ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url() ?>assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="<?= base_url() ?>assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="<?= base_url() ?>assets/vendor/php-email-form/validate.js"></script>
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
<script src="<?= base_url() ?>assets/vendor/chart.js/Chart.min.js"></script>
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
         <?php $a = $this->session->flashdata('berhasil');
         $b = $this->session->flashdata('tanggal');$textToPrint =$b . '\n' . $a; ?>
          var textToPrint = '<?php echo $textToPrint ?>'; // Teks yang akan dicetak

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
  var ctx = document.getElementById("myChart3").getContext('2d');
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
<!-- Template Main JS File -->
<script src="assets/js/main.js"></script>

</body>

</html>
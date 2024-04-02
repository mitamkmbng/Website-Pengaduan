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
  <div class="container col-lg-6">
   <div class="card o-hidden border-0 shadow-lg my-5">
    <div class="card-body p-0">
     <div class="row">
      <div class="col-lg-12">
       <div class="p-5">
        <div class="text-center">
        <img src="<?php echo base_url() ?>/assets/img/selamat.png" width="1650px" height="600px" class="img-fluid">

         <h1 class="h4 text-grey-900 mb-4">Form Pengaduan</h1>
       </div>
       <?php echo form_open_multipart('aduan/tambahAduan');?>
       <div class="form-group">
        <label for="name"><p></p></label>
      </div>
      <div class="form-group">
        <input type="hidden" name="tanggal" id="tanggal" value="date('d-m-y')">
        <label>Kategori</label>
        <select class="form-control" name="kategori" id="kategori" required="">
         <option value="">-Pilih Kategori-</option>
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
       <label for="">Tulis Aduan</label>
       <textarea class="form-control" name="aduan" id="aduan" cols="30" rows="10" required oninput="validateTextareaLength()"></textarea>
       <span style="color:red" id="charCountMessage"></span>
       <label class="mt-4" for="message">Upload Bukti Pelaporan (DOC, PDF,DOCX, JPEG,JPG, MP4, MP3)</label>
       <div id="buktiContainer">
        <div class="form-group">
          <input type="file" name="file[]" accept=".doc,.pdf,.docx,.jpeg,.jpg,.mp4,.mp3" required>
          <button type="button" class="hapusBuktiBtn">Hapus</button>
        </div>
      </div>
      <button type="button" class="form-control mt-2" id="tambahBuktiBtn">Tambah Bukti</button>
            <div class="form-group mt-4">
              <label for="">Kontak</label>
        <input type="number" min="0" class="form-control" name="kontak" placeholder="Isikan Kontak Yang Bisa Dihubungi">
        <small >*Tidak Wajib Diisi</small>
      </div>
                </div>
                <button type="submit" class="btn btn-primary btn-user btn-block">Kirim aduan</button>
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
  <script src="<?= base_url() ?>assets/js/cek.js"></script>
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

  <?php if ($this->session->flashdata('null')): ?>
    <script src="<?php echo base_url('assets/sweetalert/sweet-alert.min.js'); ?>"></script>
    <script>
      $(document).ready(function() {
        Swal.fire({
          icon: 'warning',
          title: '<?php echo $this->session->flashdata('null'); ?>',
          text: ,
        });
      });
    </script>
  <?php endif; ?>

  <script>
    window.onload = function() {
      var tanggalInput = document.getElementById('tanggal');
      var currentDate = new Date();
      var year = currentDate.getFullYear();
      var month = ("0" + (currentDate.getMonth() + 1)).slice(-2);
      var day = ("0" + currentDate.getDate()).slice(-2);
      var formattedDate = year + "-" + month + "-" + day;
      tanggalInput.value = formattedDate;
    }
  </script>
  <script>
    document.getElementById('file').addEventListener('change', function(event) {
      if (event.target.files.length > 3) {
        alert('Maaf, Anda hanya dapat memilih maksimal 3 file.');
        event.target.value = ''; // Clear the selected files
      }
    });
  </script>
  <script>
function validateTextareaLength() {
    var textarea = document.getElementById("aduan");
    var charCount = textarea.value.length;
    var charCountMessage = document.getElementById("charCountMessage");
    var submitButton = document.querySelector('button[type="submit"]');
    if (charCount < 30) {
        charCountMessage.textContent = "Masukkan setidaknya 5 kata atau 30 huruf.";
    } else {
        charCountMessage.textContent = "";
    }

    if (textarea.value.length < 30) {
      submitButton.disabled = true;
    } else {
      submitButton.disabled = false;
    }
}
</script>

</body>

</html>

 
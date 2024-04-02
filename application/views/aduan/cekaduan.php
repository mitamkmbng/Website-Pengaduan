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
                            <form method="post" action="<?php echo base_url('aduan/statusAduan'); ?>">
                               <div class="form-group">
						<label for="name"><p></p></label>
					</div>
					<div class="text-center">
						 <div class="p-2">
					<img src="<?= base_url() ?>assets/img/mark3.png" width="120px">
				</div>
			</div>

					<div class="form-group">
						<center><label>Masukkan Nomor Aduan Anda</label></center>
                        <input type="text" name="nomor" class="form-control mb-10" style="width: 100%">
					</div>
                                <button type="submit" class="btn btn-primary btn-user btn-block">Cek Aduan</button>
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
	<script src="<?= base_url() ?>assets/sweetalert2.min.js"></script>

<!-- Tambahkan bagian notifikasi di template -->
<?php if ($this->session->flashdata('tidak')) { ?>
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Data Tidak Ditemukan',
            text: '<?php echo $this->session->flashdata('tidak'); ?>',
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'OK'
        });
    </script>
<?php } ?>
</body>
</html>


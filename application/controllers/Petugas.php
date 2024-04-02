<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Petugas extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Model_aduan','aduan');
		if (!$this->session->userdata('username')) {
			redirect('auth');
		}
		if ($this->session->userdata('role') != "petugas") {
			if ($this->session->userdata('role') == "super") {
				redirect('pimpinan');
			} else {
				redirect('petugas');
			}
		}
	}

	public function index()
	{
		$data['baru'] = $this->aduan->Baru();
		$data['acc'] = $this->aduan->Acc();
		$data['kirim'] = $this->aduan->Kirim();
		$data['old'] = $this->aduan->Old();
		$data['semua'] = $this->aduan->Semua();
		$data['ditolak'] = $this->aduan->Ditolak();
		$data['belumverif'] = $this->aduan->Belumverif();
		$data['judul'] = "Dashboard Petugas";
		$this->load->view('templates/header',$data);
		$this->load->view('petugas/sidebar',$data);
		$this->load->view('templates/navbar');
		$this->load->view('petugas/index',$data);
		$this->load->view('templates/footer');
	}

	public function pengaduan()
	{
		$data['judul'] = "Aduan Masuk";
		$data['pengaduan'] = $this->aduan->getPengaduan();
		$data['aduan'] = $this->aduan->getAduan();
		$data['baru'] = $this->aduan->Baru();
		$data['belumverif'] = $this->aduan->Belumverif();
		$this->aduan->updateNotification();
		$this->load->view('templates/header',$data);
		$this->load->view('petugas/sidebar',$data);
		$this->load->view('templates/navbar');
		$this->load->view('petugas/aduan',$data);
		$this->load->view('templates/footer');
	}

	public function pengaduan_verif()
	{
		$data['judul'] = "Aduan Belum Verif";
		$data['pengaduan'] = $this->aduan->getPengaduan();
		$data['aduan'] = $this->aduan->getAduan();
		$data['baru'] = $this->aduan->Baru();
		$data['belumverif'] = $this->aduan->Belumverif();
		$this->aduan->updateNotification();
		$this->load->view('templates/header',$data);
		$this->load->view('petugas/sidebar',$data);
		$this->load->view('templates/navbar');
		$this->load->view('petugas/belum_verif',$data);
		$this->load->view('templates/footer');
	}

	public function Verifikasi($id = null)
	{
		$id = $this->input->post('id');
		$acc = $this->input->post('acc');
		$verif = $this->input->post('verif');
		if ($this->input->post('verif') == 'PENGADUAN SEDANG DIVERFIKASI PETUGAS') {
			$acc = "Belum";
		} else {
			$acc = "Sudah";
		}
		$proses1 = date('Y-m-d');
		$keterangan = $this->input->post('keterangan');
		$data = [
			'id' => $id,
			'acc' => $acc,
			'verif' => $verif,
			'keterangan'=> $keterangan,
			'proses1' => $proses1
		];

		$this->aduan->Verifikasi($data, $id);
		$this->session->set_flashdata('msg', 'Verifikasi Berhasil');
		redirect('petugas/pengaduan');
	}
	public function Proses($id = null)
	{
		$id = $this->input->post('id');
		$verif = $this->input->post('verif');
		$proses2 = date('Y-m-d');
		$notif = "Baru";
		$data = [
			'id' => $id,
			'verif' => $verif,
			'notif' => $notif,
			'proses2' => $proses2
		];
		$this->aduan->Verifikasi($data,$id);
		$this->session->set_flashdata('msg','Verifikasi Berhasil');
		redirect('petugas/AduanSelesai');
	}

	public function ubahKategori($id = null)
	{
		$id = $this->input->post('id');
		$kategoriResult = $this->db->query("SELECT * FROM pengaduan WHERE id='$id'");
		$kat = $this->input->post('kategori');
		$keterangan = "";
		$tanggal_disesuaikan = date('Y-m-d');
		if ($kategoriResult->num_rows() > 0) {
			$row = $kategoriResult->row();
			if ($kat != $row->kategori) {
				$keterangan = "Kategori Disesuaikan Oleh Petugas";
			}
		}
		$data = [
			'id' => $id,
			'kategori_disesuaikan' => $kat,
			'tanggal_disesuaikan' => $tanggal_disesuaikan,
			'keterangan' => $keterangan
		];
		$this->aduan->Verifikasi($data,$id);
		$this->session->set_flashdata('msg','Kategori Berhasil Diubah');
		redirect('petugas/pengaduan');
		
	}

	public function hapusPengaduan($id)
	{
		$this->aduan->hapusPengaduan($id);
		$this->session->set_flashdata('hapus','Dihapus');
		redirect('petugas/aduanselesai');
	}

	public function AduanSelesai()
	{
		$data['judul'] = "Aduan Diproses";
		$data['pengaduan'] = $this->aduan->verifAduan();
		$data['aduan'] = $this->aduan->AduanSelesai();
		$data['baru'] = $this->aduan->Baru();
		$data['belumverif'] = $this->aduan->Belumverif();
		$this->load->view('templates/header',$data);
		$this->load->view('petugas/sidebar',$data);
		$this->load->view('templates/navbar');
		$this->load->view('petugas/aduandone',$data);
		$this->load->view('templates/footer');
	}

	public function downloadFile($fileName)
{
    // Pastikan untuk mengamankan input dengan menghindari karakter yang tidak diinginkan
    $fileName = preg_replace('/[^A-Za-z0-9\-\.]/', '_', $fileName);

    // Pastikan $fileName adalah nama file yang sah sebelum melanjutkan

    $filePath = './direktori/' . $fileName;

    // Periksa apakah file ada di server
    if (file_exists($filePath)) {
        // Mendapatkan ekstensi file menggunakan pathinfo
        $fileExtension = pathinfo($filePath, PATHINFO_EXTENSION);

        // Set header untuk mengatur tipe konten berdasarkan ekstensi file
        switch ($fileExtension) {
            case 'doc':
            case 'docx':
                $contentType = 'application/msword';
                break;
            case 'pdf':
                $contentType = 'application/pdf';
                break;
            case 'jpg':
                $contentType = 'image/jpeg';
                break;
            default:
                $contentType = 'application/octet-stream'; // Tipe konten default jika tidak dikenali
                break;
        }

        // Set header untuk memberi nama file saat diunduh
        header('Content-Type: ' . $contentType);
        header('Content-Disposition: attachment; filename="' . $fileName . '"');

        // Baca dan keluarkan isi file ke output
        readfile($filePath);

        // Keluar dari skrip setelah mengirimkan file
        exit;
    } else {
        // Jika file tidak ditemukan di path yang ditentukan
        echo 'File not found.';
    }
}

	public function downloadFile2($id)
	{
		$file = $this->aduan->cekAduan($id);
		if ($file) {
			$filePath = './direktori/' . $file->file2;
			$fileName = $file->id;
			$fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);
        // Periksa apakah file ada di server
			if (file_exists($filePath)) {
            // Set header untuk mengatur tipe file
				switch ($fileExtension) {
					case '.doc':
					header('Content-Type: application/msword');
					break;
					case '.docx':
					header('Content-Type: application/msword');
					break;
					case '.pdf':
					header('Content-Type: application/pdf');
					break;
					case '.jpg':
					header('Content-Type: image/jpeg');
					break;
				}

            // Set header untuk memberi nama file saat diunduh
				header('Content-Disposition: attachment; filename="' .'(' . $fileName .')'.$file->file2. '"');

            // Baca dan keluarkan isi file
				readfile($filePath);

				exit;
			} else {
            // File tidak ditemukan
				echo 'File not found.';
			}
		} else {
        // Data file tidak ditemukan
			echo 'File data not found.';
		}
	}
}

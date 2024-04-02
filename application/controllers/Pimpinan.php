<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pimpinan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Model_aduan','aduan');
		$this->load->model('Model_petugas','petugas');
		$this->load->library('form_validation');
		if (!$this->session->userdata('username')) {
			redirect('auth');
		}
		if ($this->session->userdata('role') != "super") {
			if ($this->session->userdata('role') == "petugas") {
				redirect('petugas');
			} else {
				redirect('pimpinan');
			}
		}
	}
	

	public function index()
	{	
		$data['kirim'] = $this->aduan->Kirim();
		$data['old'] = $this->aduan->Old();
		$data['semua'] = $this->aduan->Semua();
		$data['selesai'] = $this->aduan->Selesai();
		$data['ditolak'] = $this->aduan->ditolakpimpinan();
		$data['judul'] = "Dashboard Pimpinan";
		$data['petugas'] = $this->petugas->jumlahPetugas();
		$this->load->view('templates/header',$data);
		$this->load->view('pimpinan/sidebar');
		$this->load->view('templates/navbar');
		$this->load->view('pimpinan/index',$data);
		$this->load->view('templates/footer');
	}

	public function petugas()
	{
		$data['judul'] = "Data Petugas";
		$data['petugas']= $this->petugas->getPetugas();
		$data['user']= $this->petugas->getUser();
		$data['kirim'] = $this->aduan->Kirim();
		$this->load->view('templates/header',$data);
		$this->load->view('pimpinan/sidebar',$data);
		$this->load->view('templates/navbar');
		$this->load->view('pimpinan/petugas',$data);
		$this->load->view('templates/footer');
	}

	public function tambahPetugas()
	{
		$this->form_validation->set_rules('username', 'Username', 'required|is_unique[user.username]');
		$username = $this->input->post('username');
		$nama = $this->input->post('nama');
		$password = $this->input->post('password');
		$password = md5($password);
		$role = 'petugas';
		$data = [
			'username' => $username,
			'nama' => $nama,
			'password' => $password,
			'role' => $role,
		];
		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('msg', "Username Sudah Terdaftar");
			redirect('pimpinan/petugas');
		}else{
			$this->session->set_flashdata('msg', "	ditambahkan");
			$this->petugas->tambahPetugas($data);
			redirect('pimpinan/petugas');
		}
	}

	public function editPetugas()
	{
		$username = $this->input->post('username');
		$nama = $this->input->post('nama');
		$password = $this->input->post('password');
		$password = md5($password);
		$role = $this->input->post('role');
		if ($this->input->post('password') == null) {
			$data = [
				'username' => $username,
				'nama' => $nama,
				'role' => $role,
			];
		}else{
			$data = [
				'username' => $username,
				'nama' => $nama,
				'password' => $password,
				'role' => $role,
			];
		}

		$this->session->set_flashdata('msg', "	diupdate");
		$this->petugas->editPetugas($data);
		redirect('pimpinan/petugas');
	}

	public function hapusPetugas($id)
	{
		$this->petugas->hapusPetugas($id);
		$this->session->set_flashdata('msg', "Dihapus");
		redirect('pimpinan/petugas');
	}

	public function laporan()
	{
		$data['judul'] = "Rekap Aduan";
		$data['aduan'] = $this->aduan->aduanSelesai();
		$data['kirim'] = $this->aduan->Kirim();
		$data['diterima'] = $this->aduan->chartditerima1();
		$data['ditolak'] = $this->aduan->chartditolak1();
		$data['suap'] = $this->aduan->suap1();
		$data['pungli'] = $this->aduan->pungli1();
		$data['pelecehan'] = $this->aduan->pelecehan1();
		$data['kekerasan'] = $this->aduan->kekerasan1();
		$data['narkoba'] = $this->aduan->narkoba1();
		$data['radikalisme'] = $this->aduan->radikalisme1();
		$data['pengembangan'] = $this->aduan->pengembangan1();
		$data['kerusakan'] = $this->aduan->kerusakan1();
		$data['layanan'] = $this->aduan->layanan1();
		$this->aduan->updateNotif();
		$this->aduan->updateVerif();
		$this->load->view('templates/header',$data);
		$this->load->view('pimpinan/sidebar',$data);
		$this->load->view('templates/navbar');
		$this->load->view('pimpinan/laporan',$data);
	}

	public function filterDataByDate() 
	{
		$start_date = $this->input->post('start_date');
		$end_date = $this->input->post('end_date');
		$start_date = date('Y-m-d', strtotime($start_date));
		$end_date = date('Y-m-d', strtotime($end_date));
		$data['filtered_data'] = $this->aduan->getFilteredData($start_date, $end_date);
		$data['judul'] = "Rekap Aduan";
		$data['kirim'] = $this->aduan->Kirim();
		if ($start_date != null && $end_date != null) {
			$start_date = date('Y-m-d', strtotime($start_date));
			$end_date = date('Y-m-d', strtotime($end_date));
			$data['diterima'] = $this->aduan->chartditerima($start_date, $end_date);
			$data['ditolak'] = $this->aduan->chartditolak($start_date, $end_date);
			$data['suap'] = $this->aduan->suap($start_date, $end_date);
			$data['pungli'] = $this->aduan->pungli($start_date, $end_date);
			$data['pelecehan'] = $this->aduan->pelecehan($start_date, $end_date);
			$data['kekerasan'] = $this->aduan->kekerasan($start_date, $end_date);
			$data['narkoba'] = $this->aduan->narkoba($start_date, $end_date);
			$data['radikalisme'] = $this->aduan->radikalisme($start_date, $end_date);
			$data['pengembangan'] = $this->aduan->pengembangan($start_date, $end_date);
			$data['kerusakan'] = $this->aduan->kerusakan($start_date, $end_date);
			$data['layanan'] = $this->aduan->layanan($start_date, $end_date);
		}
		
		$this->load->view('templates/header',$data);
		$this->load->view('pimpinan/sidebar',$data);
		$this->load->view('templates/navbar');
		$this->load->view('pimpinan/laporan',$data);
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

	public function aduanBaru()
	{
		$data['aduan'] = $this->aduan->aduanBaru();
		$data['kirim'] = $this->aduan->Kirim();
		$data['judul'] = "Aduan Baru";
		$this->aduan->updateNotif();
		$this->aduan->updateVerif();
		$this->load->view('templates/header',$data);
		$this->load->view('pimpinan/sidebar',$data);
		$this->load->view('templates/navbar');
		$this->load->view('pimpinan/pengaduan_baru',$data);
		$this->load->view('templates/footer');
	}

	public function aduanDilihat()
	{
		$data['aduan'] = $this->aduan->aduanDilihat();
		$data['kirim'] = $this->aduan->Kirim();
		$data['judul'] = "Aduan Sudah Dilihat";
		$this->load->view('templates/header',$data);
		$this->load->view('pimpinan/sidebar',$data);
		$this->load->view('templates/navbar');
		$this->load->view('pimpinan/pengaduan_dilihat',$data);
		$this->load->view('templates/footer');
	}

	public function aduanSelesai()
	{
		$data['aduan'] = $this->aduan->aduanDitolak();
		$data['kirim'] = $this->aduan->Kirim();
		$data['judul'] = "Aduan Selesai Diproses";
		$this->load->view('templates/header',$data);
		$this->load->view('pimpinan/sidebar',$data);
		$this->load->view('templates/navbar');
		$this->load->view('pimpinan/pengaduan_ditolak',$data);
		$this->load->view('templates/footer');
	}

	public function Proses($id = null)
	{
		$id = $this->input->post('id');
		$verif = $this->input->post('verif');
		$keterangan = $this->input->post('keterangan');
		$notif = "Selesai";
		$proses3 = date('Y-m-d');
		$data = [
			'id' => $id,
			'verif' => $verif,
			'keterangan' => $keterangan,
			'notif' => $notif,
			'proses3' => $proses3
		];
		$this->aduan->Verifikasi($data,$id);
		$this->session->set_flashdata('msg','Verifikasi Berhasil');
		redirect('pimpinan/AduanBaru');
	}

}

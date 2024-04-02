<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aduan extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Model_aduan','aduan');
  }

  public function index()
  {
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
    $data['judul'] = "LAYANAN PENGADUAN";
    $this->load->view('aduan/landing',$data);
    $this->load->view('aduan/sambungan',$data);
  }

  public function ajukanAduan()
  {
    $data['judul'] = "LAYANAN PENGADUAN";
    $this->load->view('aduan/ajukanaduan',$data);
  }

  public function tambahAduan()
{
    $data['judul'] = "LAYANAN PENGADUAN";
    $this->load->view('aduan/ajukanaduan', $data);

    // Input data
    $aduanData = array(
        'nomor' => $this->random_id->generate_random_id(),
        'tanggal' => $this->input->post('tanggal'),
        'kategori' => $this->input->post('kategori'),
        'aduan' => $this->input->post('aduan'),
        'acc' => "Belum",
        'notif' => "New",
        'verif' => "PENGADUAN SEDANG DIVERIFIKASI PETUGAS",
        'kontak' => $this->input->post('kontak')
    );

    // Upload files
    $config['upload_path'] = './direktori/';
    $config['allowed_types'] = 'jpg|pdf|doc|docx|jpeg|png|mp4|mp3';
    $config['max_size'] = 20048; // Maximum file size in kilobytes (2 MB)
    $this->load->library('upload', $config);

    $uploaded_files = array();
    $is_error = false;

    foreach ($_FILES['file']['name'] as $key => $filename) {
    // Generate a random unique ID
    $random_code = uniqid();

    // Get the file extension from the original file name
    $file_extension = pathinfo($_FILES['file']['name'][$key], PATHINFO_EXTENSION);

    // Create the new file name with the random code and original file extension
    $new_filename = $random_code . '.' . $file_extension;

    // Set the new file name in the $_FILES array
    $_FILES['userfile']['name'] = $new_filename;
    $_FILES['userfile']['type'] = $_FILES['file']['type'][$key];
    $_FILES['userfile']['tmp_name'] = $_FILES['file']['tmp_name'][$key];
    $_FILES['userfile']['error'] = $_FILES['file']['error'][$key];
    $_FILES['userfile']['size'] = $_FILES['file']['size'][$key];

    if ($this->upload->do_upload('userfile')) {
        $file_data = $this->upload->data();
        $uploaded_files[] = $file_data['file_name'];
    } else {
        $is_error = true;
        break;
    }
}


    if ($is_error) {
        // Jika terjadi error saat upload file
        $error = $this->upload->display_errors();
        $this->session->set_flashdata('error', 'Pastikan format file sesuai dan ukuran file tidak melebihi 2 MB.');
        redirect('aduan/ajukanAduan');
        return;
    }

    $aduanData['file'] = implode(',', $uploaded_files); // Save uploaded file names as comma-separated string

    $this->db->insert('pengaduan', $aduanData);
    $this->session->set_flashdata('berhasil', $aduanData['nomor']);
    $this->session->set_flashdata('tanggal', date('d-m-Y', strtotime($aduanData['tanggal'])));
    redirect('aduan');
}

  public function generateCaptcha() {
  // Daftar pertanyaan dan jawaban
    $questions = array(
      "Prodi TI UNIMA berdiri tahun berapa ?" => array(
        "correct" => "2016",
        "wrong" => array("2014", "2018", "2020")
      ),
      "Sebutkan visi TI UNIMA" => array(
        "correct" => "Pada Tahun 2022 menjadi Program Studi penghasil tenaga ahli Teknik Informatika yang berkarakter , inovatif , dan unggul kompetitif.",
        "wrong" => array("Melaksanakan dan mengembangkan pendidikan yang berkualitas untuk menghasilkan lulusan ahli Teknik Informatika yang berkarakter, inovatif, dan unggul kompetitif.", "Melaksanakan dan mengembangkan penelitian di bidang Teknik Informatika yang berkarakter, inovatif, dan unggul kompetitif.", "Melaksanakan dan mengembangkan kegiatan pengabdian kepada masyarakat di bidang Teknik Informatika yang berkarakter, inovatif, dan unggul kompetitif.")
      ),
      "Malam Kebersamaan TI UNIMA Telah dilaksanakan berapa kali ?" => array(
        "correct" => "7 kali",
        "wrong" => array("1 kali", "3 kali", "10 kali")
      ),
      "Sebutkan nama pimpinan prodi sekarang" => array(
        "correct" => "Vivi Peggie Rantung, ST, MISD",
        "wrong" => array("Vivi Peggie Rantung", "Vivi P. Rantung", "Vivi Peggie R")
      )
    );

  // Pilih pertanyaan secara acak
    $randomQuestion = array_rand($questions);
    $randomAnswers = $questions[$randomQuestion];
    $this->session->set_userdata('captcha_answers', $randomAnswers);
    return array(
      'question' => $randomQuestion,
      'answers' => $randomAnswers
    );
  }
  public function captcha()
  {
    $data['judul'] = "LAYANAN PENGADUAN";
    $data['captcha'] = $this->generateCaptcha();
    // Tampilkan pertanyaan pada view
    $this->load->view('aduan/aduan',$data);

  }

  public function checkCaptcha() {
    $userAnswer = $this->input->post('answer');
    $correctAnswers = $this->session->userdata('captcha_answers');
    
    if (in_array($userAnswer, $correctAnswers)) {
      redirect('aduan/ajukanaduan');
    } else {
      $this->session->set_flashdata('salah','Jawaban Salah');
      redirect('aduan/Captcha');
    }
  }

  public function cekAduan()
  {
    $data['judul'] = "Cek Laporan Pengaduan";
    $this->load->view('aduan/cekaduan',$data);
  }

  public function statusAduan()
  {
   $nomor = $this->input->post('nomor');
   $data['aduan'] = $this->aduan->cekStatus($nomor);
   $data['judul'] = "LAYANAN PENGADUAN";
   $this->session->set_flashdata('tidak', 'Data tidak ditemukan.');
   $this->load->view('aduan/statusaduan',$data);

 }

 public function downloadFile($id)
 {
  $file = $this->aduan->cekAduan($id);
  if ($file) {
    $filePath = './direktori/' . $file->file;
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
      header('Content-Disposition: attachment; filename="' .'(' . $fileName .')'.$file->file. '"');

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
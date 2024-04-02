<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_aduan extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('Random_id');
    }

    public function getAduan()
    {
        $this->db->where('acc', 'Belum');
        $this->db->order_by('id', 'DESC');
        return $this->db->get('pengaduan')->result_array();
    }

    public function getPengaduan()
    {
        return $this->db->get('pengaduan')->result_array();
    }

    public function AduanSelesai()
    {
        $this->db->where('acc', 'Sudah');
        $this->db->order_by('id', 'DESC');
        return $this->db->get('pengaduan')->result_array();;
    }

    public function AduanBaru()
    {
        $this->db->where('acc', 'Sudah');
        $this->db->where_in('notif', array('Baru', 'Old'));
        $this->db->order_by('id', 'DESC');
        return $this->db->get('pengaduan')->result_array();
    }

    public function AduanDilihat()
    {
        $this->db->where('acc', 'Sudah');
        $this->db->where('notif', 'Old');
        $this->db->order_by('id', 'DESC');
        return $this->db->get('pengaduan')->result_array();;
    }

    public function AduanDitolak()
    {
        $this->db->where('acc', 'Sudah');
        $this->db->where('notif', 'Selesai');
        $this->db->order_by('id', 'DESC');
        return $this->db->get('pengaduan')->result_array();;
    }

    public function verifAduan()
    {
        $this->db->where('acc', 'Sudah');
        $this->db->order_by('id', 'DESC');
        return $this->db->get('pengaduan')->result_array();;
    }

    public function Verifikasi($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('pengaduan', $data);
    }

    public function hapusPengaduan($id)
    {
        $file = $this->db->get_where('pengaduan', array('id' => $id))->row();
        if ($file) {
            $filePath = './aduan/' . $file->aduan;

        // Periksa apakah file ada di server
            if (file_exists($filePath)) {
            // Hapus file dari server
                unlink($filePath);
            }

        // Hapus data file dari database
            $this->db->where('id', $id);
            $this->db->delete('pengaduan');

            return true;
        } else {
        // Data file tidak ditemukan
            return false;
        }
    }

    public function cekAduan($id)
    {
    // Ambil data aduan berdasarkan ID
        $query = $this->db->get_where('pengaduan', array('id' => $id));
        return $query->row();
    }

    public function cekStatus($nomor)
    {
        $query = $this->db->get_where('pengaduan', array('nomor' => $nomor));
        return $query->row();
    }

    public function getFilteredData($start_date, $end_date)
    {
        $this->db->where('tanggal >=', $start_date);
        $this->db->where('tanggal <=', $end_date);
        $this->db->order_by('tanggal', 'desc');
        return $this->db->get('pengaduan')->result();
    }

    public function chartditerima1()
    {
        $this->db->where('verif', 'PENGADUAN TELAH DITERIMA OLEH PIMPINAN');
        return $this->db->get('pengaduan');
    }

    public function chartditolak1()
    {
        $this->db->where_in('verif', array('PENGADUAN DITOLAK OLEH PIMPINAN', 'PENGADUAN DITOLAK PETUGAS'));
        return $this->db->get('pengaduan');
    }

    public function chartditerima($start_date, $end_date)
    {
        $this->db->where('tanggal >=', $start_date);
        $this->db->where('tanggal <=', $end_date);
        $this->db->where('verif', 'PENGADUAN TELAH DITERIMA OLEH PIMPINAN');
        return $this->db->get('pengaduan');
    }

    public function chartditolak($start_date, $end_date)
    {
        $this->db->where('tanggal >=', $start_date);
        $this->db->where('tanggal <=', $end_date);
        $this->db->where_in('verif', array('PENGADUAN DITOLAK OLEH PIMPINAN', 'PENGADUAN DITOLAK PETUGAS'));
        return $this->db->get('pengaduan');
    }

    public function suap($start_date, $end_date)
    {
        $this->db->where('tanggal >=', $start_date);
        $this->db->where('tanggal <=', $end_date);
        $this->db->where('kategori', 'Gratifikasi Suap');
        return $this->db->get('pengaduan');
    }

    public function suap1()
    {
        $this->db->where('kategori', 'Gratifikasi Suap');
        return $this->db->get('pengaduan');
    }

    public function pungli($start_date, $end_date)
    {
        $this->db->where('tanggal >=', $start_date);
        $this->db->where('tanggal <=', $end_date);
        $this->db->where('kategori', 'Pungutan Liar/Pungli');
        return $this->db->get('pengaduan');
    }

    public function pungli1()
    {
        $this->db->where('kategori', 'Pungutan Liar/Pungli');
        return $this->db->get('pengaduan');
    }

    public function pelecehan($start_date, $end_date)
    {
        $this->db->where('tanggal >=', $start_date);
        $this->db->where('tanggal <=', $end_date);
        $this->db->where('kategori', 'Pelecehan Seksual');
        return $this->db->get('pengaduan');
    }

    public function pelecehan1()
    {
        $this->db->where('kategori', 'Pelecehan Seksual');
        return $this->db->get('pengaduan');
    }

    public function kekerasan($start_date, $end_date)
    {
        $this->db->where('tanggal >=', $start_date);
        $this->db->where('tanggal <=', $end_date);
        $this->db->where('kategori', 'Kekerasan Fisik/Non Fisik');
        return $this->db->get('pengaduan');
    }

    public function kekerasan1()
    {
        $this->db->where('kategori', 'Kekerasan Fisik/Non Fisik');
        return $this->db->get('pengaduan');
    }

    public function narkoba($start_date, $end_date)
    {
        $this->db->where('tanggal >=', $start_date);
        $this->db->where('tanggal <=', $end_date);
        $this->db->where('kategori', 'Narkoba');
        return $this->db->get('pengaduan');
    }

    public function narkoba1()
    {
        $this->db->where('kategori', 'Narkoba');
        return $this->db->get('pengaduan');
    }

    public function radikalisme($start_date, $end_date)
    {
        $this->db->where('tanggal >=', $start_date);
        $this->db->where('tanggal <=', $end_date);
        $this->db->where('kategori', 'Radikalisme/Terorisme');
        return $this->db->get('pengaduan');
    }

    public function radikalisme1()
    {
        $this->db->where('kategori', 'Radikalisme/Terorisme');
        return $this->db->get('pengaduan');
    }

    public function pengembangan($start_date, $end_date)
    {
        $this->db->where('tanggal >=', $start_date);
        $this->db->where('tanggal <=', $end_date);
        $this->db->where('kategori', 'Usulan Pengembangan');
        return $this->db->get('pengaduan');
    }

    public function pengembangan1()
    {
        $this->db->where('kategori', 'Usulan Pengembangan');
        return $this->db->get('pengaduan');
    }

    public function kerusakan($start_date, $end_date)
    {
        $this->db->where('tanggal >=', $start_date);
        $this->db->where('tanggal <=', $end_date);
        $this->db->where('kategori', 'Kerusakan Fasilitas');
        return $this->db->get('pengaduan');
    }

    public function kerusakan1()
    {
        $this->db->where('kategori', 'Kerusakan Fasilitas');
        return $this->db->get('pengaduan');
    }

    public function layanan($start_date, $end_date)
    {
        $this->db->where('tanggal >=', $start_date);
        $this->db->where('tanggal <=', $end_date);
        $this->db->where('kategori', 'Ketidakpuasan Layanan');
        return $this->db->get('pengaduan');
    }

    public function layanan1()
    {
        $this->db->where('kategori', 'Ketidakpuasan Layanan');
        return $this->db->get('pengaduan');
    }

    public function updateNotification()
    {
        $this->db->set('notif', 'Acc');
        $this->db->where('notif', 'New');
        $this->db->update('pengaduan');
    }

    public function updateNotif()
    {
        $this->db->set('notif', 'Old');
        $this->db->where('notif', 'Baru');
        $this->db->update('pengaduan');
    }

    public function updateVerif()
    {
        $this->db->set('verif', 'PENGADUAN DITERIMA PIMPINAN');
        $this->db->where('verif', 'PENGADUAN SEDANG DIPROSES PIMPINAN');
        $this->db->update('pengaduan');
    }

    // ITUNG MENGHITUNG

    public function Baru()
    {
        $this->db->where('notif', 'New');
        $query = $this->db->get('pengaduan');
        $count = $query->num_rows();
        return $count;
    }

    public function Acc()
    {
        $this->db->where('notif', 'Acc');
        $query = $this->db->get('pengaduan');
        $count = $query->num_rows();
        return $count;
    }

    public function Kirim()
    {
        $this->db->where('notif', 'Baru');
        $query = $this->db->get('pengaduan');
        $count = $query->num_rows();
        return $count;
    }

    public function Old()
    {
        $this->db->where('notif', 'Old');
        $query = $this->db->get('pengaduan');
        $count = $query->num_rows();
        return $count;
    }

    public function Semua()
    {
        $this->db->where('verif !=', 'PENGADUAN DITOLAK PETUGAS');
        $query = $this->db->get('pengaduan');
        $count = $query->num_rows();
        return $count;
    }

    public function Ditolak()
    {
        $this->db->where('verif', 'PENGADUAN DITOLAK PETUGAS');
        $query = $this->db->get('pengaduan');
        $count = $query->num_rows();
        return $count;
    }

    public function ditolakpimpinan()
    {
        $this->db->where('verif', 'PENGADUAN DITOLAK OLEH PIMPINAN');
        $query = $this->db->get('pengaduan');
        $count = $query->num_rows();
        return $count;
    }

    public function Selesai()
    {
        $this->db->where('notif', 'Selesai');
        $query = $this->db->get('pengaduan');
        $count = $query->num_rows();
        return $count;
    }

    public function Belumverif()
    {
        $this->db->where('notif', 'Acc');
        $this->db->where('acc', 'Belum');
        $query = $this->db->get('pengaduan');
        $count = $query->num_rows();
        return $count;
    }
    
}

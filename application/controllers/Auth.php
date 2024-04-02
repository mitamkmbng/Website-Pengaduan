<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Model_login','model_login');
    }

    public function index()
    {
        $data['judul'] = "Halaman Login";
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('password', 'password', 'required|trim');

    // Cek apakah pengguna sudah memiliki sesi login
        if ($this->session->userdata('username')) {
            $role = $this->session->userdata('role');
            if ($role == 'super') {
                redirect('pimpinan');
            } else if ($role == 'petugas') {
                redirect('petugas');
            } else {
                redirect('auth');
            }
        } else {
        // Pengguna belum memiliki sesi login, lanjutkan dengan validasi form
            if ($this->form_validation->run() == false) {
                $data['judul'] = 'Halaman Login';
                $this->load->view('auth/login', $data);
            } else {
                $login = $this->model_login->cek_login();
                if ($login == false) {
                    $this->session->set_flashdata('gagal', 'Username atau password salah!');
                    redirect('auth');
                } else {
                    $this->session->set_userdata('id', $login->id);
                    $this->session->set_userdata('username', $login->username);
                    $this->session->set_userdata('nama', $login->nama);
                    $this->session->set_userdata('role', $login->role);

                    if ($login->role == "super") {
                        redirect('pimpinan');
                    } else if ($login->role == "petugas") {
                        redirect('petugas');
                    } else {
                        redirect('auth');
                    }
                }
            }
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('aduan');
    }
}
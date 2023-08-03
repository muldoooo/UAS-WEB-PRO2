<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Staff extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('staff_model', 'model_staff');

        $this->load->model('auth_model');

        if (!$this->auth_model->current_user()) {
            redirect('auth/login');
        }
    }

    public function index()
    {
        $data['daftar_staff'] = $this->model_staff->daftar_staff();
        $data['konten'] = "staff/v_staff";
        $data['judul'] = "Daftar Staff";
        $this->load->view('template/master', $data);
    }

    public function Simpan()
    {
        $username       = $this->input->post('username');
        $name      = $this->input->post('name');
        $pass           = $this->input->post('password');
        $email      = $this->input->post('email');

        $data = array(
            'username'  =>  $username,
            'name' =>  $name,
            'email' => $email,
            'password'  =>  $pass,

        );

        $simpan         = $this->db->insert('user', $data);
        if ($simpan) {
            $this->session->set_Flashdata('flash', 'Tersimpan');
            redirect('staff');
        } else {
            $this->session->set_Flashdata('FlashGagal', 'Gagal Tersimpan');
            redirect('staff');
        };
    }

    public function Simpan_edit()
    {
        $username       = $this->input->post('username');
        $name           = $this->input->post('name');
        $pass           = $this->input->post('password');
        $email          = $this->input->post('email');

        // array menampung data yang akan disimpan
        $data = array(
            'username'      => $username,
            'name'          => $name,
            'password'      => $pass,
            'email'         => $email
        );
        $this->db->where('username', $username);
        $update = $this->db->update('user', $data);
        if ($update) {
            $this->session->set_flashdata('flashUpdate', 'Terupdate');
            redirect('staff');
        } else {
            $this->session->set_flasdata('fUpdateGagal', 'Gagal Terupdate');
            redirect('staff');
        };
    }

    public function Hapus($username)
    {
        $hapus = $this->db->delete('user', array('username' => $username));

        if ($hapus) {
            $this->session->set_flashdata('flashHapus', 'Terhapus');
            redirect('staff');
        } else {
            $this->session->set_flashdata('fGagalTerhapus', 'Gagal Terhapus');
            redirect('staff');
        };
    }
}

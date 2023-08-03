<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Produk extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('produk_model', 'model_produk');

        $this->load->model('auth_model');

        if (!$this->auth_model->current_user()) {
            redirect('auth/login');
        }
    }

    public function index()
    {
        //get kategori
        $data['kategori'] = $this->db->query('SELECT * FROM tkategori')->result();
        $data['daftar_produk']  = $this->model_produk->daftar_produk();
        $data['konten']         = "produk/v_produk";
        $data['judul']          = "Daftar Produk";
        $this->load->view('template/master', $data);
    }

    public function Simpan()
    {

        //upload img
        $upload = $this->do_upload();
        if ($upload['error']) {
            $this->session->set_flashdata('flashGagal', 'Gagal' . $upload['error']);
            redirect('produk');
        }

        $photo            = $this->input->post('photo');
        $kode_produk      = $this->input->post('kode_produk');
        $nama_produk      = $this->input->post('nama_produk');
        $kategori         = $this->input->post('kategori');
        $kwalitas         = $this->input->post('kwalitas');
        $uom              = $this->input->post('uom');
        $grid             = $this->input->post('grid');
        $qty              = $this->input->post('qty');


        // array menampung data yang akan disimpan
        $data = array(
            'photo'             => $upload['file_name'],
            'kode_produk'       => $kode_produk,
            'nama_produk'       => $nama_produk,
            'kategori'          => $kategori,
            'kwalitas'          => $kwalitas,
            'uom'               => $uom,
            'grid'              => $grid,
            'qty'               => $qty
        );

        $simpan         = $this->db->insert('produk', $data);
        if ($simpan) {
            $this->session->set_Flashdata('flash', 'Tersimpan');
            redirect('produk');
        } else {
            $this->session->set_Flashdata('flashGagal', 'Gagal Tersimpan');
            redirect('produk');
        };
    }

    public function Simpan_edit()
    {
        $photo            = $this->input->post('photo');
        $kode_produk      = $this->input->post('kode_produk');
        $nama_produk      = $this->input->post('nama_produk');
        $kategori         = $this->input->post('kategori');
        $kwalitas         = $this->input->post('kwalitas');
        $uom              = $this->input->post('uom');
        $grid             = $this->input->post('grid');
        $qty              = $this->input->post('qty');


        // array menampung data yang akan disimpan
        if ($_FILES['photo']['name']) {
            $upload = $this->do_upload();
            if ($upload['error']) {
                $this->session->set_flashdata('flashGagal', 'Gagal' . $upload['error']);
                redirect('dataassets');
            }

            $data = array(
                'photo'             => $upload['file_name'],
                'kode_produk'       => $kode_produk,
                'nama_produk'       => $nama_produk,
                'kategori'          => $kategori,
                'kwalitas'          => $kwalitas,
                'uom'               => $uom,
                'grid'              => $grid,
                'qty'               => $qty
            );
        } else {
            $data = array(
                'kode_produk'       => $kode_produk,
                'nama_produk'       => $nama_produk,
                'kategori'          => $kategori,
                'kwalitas'          => $kwalitas,
                'uom'               => $uom,
                'grid'              => $grid,
                'qty'               => $qty
            );
        }

        $this->db->where('kode_produk', $kode_produk);
        $update = $this->db->update('produk', $data);

        if ($update) {
            $this->session->set_flashdata('flashUpdate', 'Terupdate');
            redirect('produk');
        } else {
            $this->session->set_flashdata('fUpdateGagal', 'Gagal Terupdate');
            redirect('produk');
        }
    }

    public function Hapus($id_produk)
    {
        $hapus = $this->db->delete('produk', array('id_produk' => $id_produk));

        if ($hapus) {
            $this->session->set_flashdata('flashHapus', 'Terhapus');
            redirect('produk');
        } else {
            $this->session->set_flashdata('fGagalTerhapus', 'Gagal Terhapus');
            redirect('produk');
        };
    }

    public function do_upload()
    {
        $config['upload_path'] = 'assets/img/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['max_size'] = 2048;
        $config['file_name'] = date("YmdHis") . $this->input->post('photo');

        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('photo')) {
            $error = $this->upload->display_errors();
            return $error;
        } else {
            $data = $this->upload->data();
            return $data;
        }
    }
}

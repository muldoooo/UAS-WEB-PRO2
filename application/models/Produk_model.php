<?php

class Produk_model extends CI_Model
{   
    public function daftar_produk(){
        $query = "SELECT `produk`.*,
        `tkategori`.`nama_kategori`,
        `tkategori`.`kode_kategori`
        FROM `tkategori`
        INNER JOIN `produk` ON `tkategori`.`id_kategori` = `produk`.`kategori`";

        $data_produk = $this->db->query($query);
        return $data_produk->result();
    }

    public function Lihat($id_produk){
        $this->db->where('id_produk', $id_produk);
        return $this->db->get('produk')->row();
    }
}
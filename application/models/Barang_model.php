<?php

class Barang_model extends CI_Model
{
    public function getAllBarang()
    {
        return $this->db->get('Barang')->result_array();
    }

    public function deleteBarang($id)
    {
        $this->db->delete("barang", ["id" => $id]);
    }

    public function insertBarang()
    {
        $data = [
            "merk" => $this->input->post("merk", true),
            "seri" => $this->input->post("seri", true),
            "spesifikasi" => $this->input->post("spesifikasi", true),
            "stok" => $this->input->post("stok", true),
            "kategori_id" => $this->input->post("kategori_id", true),
        ];
        $this->db->insert("barang", $data);
    }

    public function getBarangById($id)
    {
        return $this->db->get_where("Barang", ["id" => $id])->row_array();
    }

    public function ubahDataBarang()
    {
        $data = [
            "merk" => $this->input->post("merk", true),
            "seri" => $this->input->post("seri", true),
            "spesifikasi" => $this->input->post("spesifikasi", true),
            "stok" => $this->input->post("stok", true),
            "kategori_id" => $this->input->post("kategori_id", true),
        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('barang', $data);
    }

    public function count_all_Barang()
    {
        return $this->db->get('barang')->num_rows();
    }
}
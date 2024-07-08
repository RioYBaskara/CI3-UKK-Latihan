<?php

class Kategori_model extends CI_Model
{
    public function getAllKategori()
    {
        return $this->db->get('kategori')->result_array();
    }

    public function deleteKategori($id)
    {
        $this->db->delete("kategori", ["id" => $id]);
    }

    public function insertKategori()
    {
        $data = [
            "deskripsi" => $this->input->post("deskripsi", true),
            "kategori" => $this->input->post("kategori", true)
        ];
        $this->db->insert("kategori", $data);
    }

    public function getKategoriById($id)
    {
        return $this->db->get_where("kategori", ["id" => $id])->row_array();
    }

    public function ubahDataKategori()
    {
        $data = [
            "deskripsi" => $this->input->post("deskripsi", true),
            "kategori" => $this->input->post("kategori", true)
        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('kategori', $data);
    }

    public function count_all_kategori()
    {
        return $this->db->get('kategori')->num_rows();
    }
}
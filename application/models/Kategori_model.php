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
}
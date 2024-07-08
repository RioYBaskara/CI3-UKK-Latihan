<?php

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Kategori_model");
        $this->load->model("Barang_model");
        // $this->load->model("BarangMasuk_model");
        // $this->load->model("BarangKeluar_model");
    }
    public function index()
    {
        $data['judul'] = 'Halaman Home';
        $data['total_rows_kategori'] = $this->Kategori_model->count_all_kategori();
        $data['total_rows_barang'] = $this->Barang_model->count_all_barang();
        // $data['total_rows_barangmasuk'] = $this->BarangMasuk_model->count_all_barangmasuk();
        // $data['total_rows_barangkeluar'] = $this->BarangKeluar_model->count_all_barangkeluar();

        $this->load->view("templates/header.php", $data);
        $this->load->view("templates/templateatas.php");
        $this->load->view("templates/dashboard.php", $data);
        $this->load->view("templates/templatebawah.php");
        $this->load->view("templates/footer.php");
    }
}
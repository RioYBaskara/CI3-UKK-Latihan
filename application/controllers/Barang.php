<?php

class Barang extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Barang_model");
        $this->load->library("form_validation");
    }

    public function index()
    {
        $data['judul'] = 'Halaman Barang';
        $data['barang'] = $this->Barang_model->getAllBarang();

        $this->load->view("templates/header.php", $data);
        $this->load->view("templates/templateatas.php");
        $this->load->view("barang/index.php", $data);
        $this->load->view("templates/templatebawah.php");
        $this->load->view("templates/footer.php");
    }

    public function tambah()
    {
        $data["judul"] = "Form Tambah Data Barang";

        // Rules untuk form_validation
        $this->form_validation->set_rules("merk", "Merk", "required");
        $this->form_validation->set_rules("seri", "Seri", "required");
        $this->form_validation->set_rules("spesifikasi", "Spesifikasi", "required");
        $this->form_validation->set_rules("stok", "Stok", "required|numeric");
        $this->form_validation->set_rules("kategori_id", "ID Kategori", "required");

        // CREATE || Pengkondisian form_validation, jika input salah, kembali ke view form input. jika input benar, menjalankan query untuk menambahkan data ke tabel mahasiswa lalu redirect dengan session, flashdata
        if ($this->form_validation->run() == FALSE) {
            $this->load->view("templates/header.php", $data);
            $this->load->view("templates/templateatas.php");
            $this->load->view("barang/tambah.php");
            $this->load->view("templates/templatebawah.php");
            $this->load->view("templates/footer.php");
        } else {
            $this->Barang_model->insertBarang();
            // flashdata, session flash dengan isi Ditambahkan
            $this->session->set_flashdata("flash", "Ditambahkan");
            // mengalihkan ke view mahasiswa
            redirect('barang');
        }
    }

    public function hapus($id)
    {
        $this->Barang_model->deleteBarang($id);
        $this->session->set_flashdata("flash", "Dihapus");
        redirect('barang');
    }

    public function detail($id)
    {
        $data['judul'] = 'Halaman Detail Barang';
        $data['barang'] = $this->Barang_model->getBarangById($id);

        $this->load->view("templates/header.php", $data);
        $this->load->view("templates/templateatas.php");
        $this->load->view("barang/detail.php");
        $this->load->view("templates/templatebawah.php");
        $this->load->view("templates/footer.php");
    }

    public function ubah($id)
    {
        $data['judul'] = 'Halaman Ubah Data Barang';
        $data['barang'] = $this->Barang_model->getBarangById($id);

        $this->form_validation->set_rules("merk", "Merk", "required");
        $this->form_validation->set_rules("seri", "Seri", "required");
        $this->form_validation->set_rules("spesifikasi", "Spesifikasi", "required");
        $this->form_validation->set_rules("stok", "Stok", "required|numeric");
        $this->form_validation->set_rules("kategori_id", "ID Kategori", "required");

        if ($this->form_validation->run() == FALSE) {
            $this->load->view("templates/header.php", $data);
            $this->load->view("templates/templateatas.php");
            $this->load->view("barang/ubah.php", $data);
            $this->load->view("templates/templatebawah.php");
            $this->load->view("templates/footer.php");
        } else {
            $this->Barang_model->ubahDataBarang();
            // flashdata, session flash dengan isi Ditambahkan
            $this->session->set_flashdata("flash", "Diubah");
            // mengalihkan ke view mahasiswa
            redirect('barang');
        }
    }
}
<?php

class Kategori extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Kategori_model");
        $this->load->library("form_validation");
    }

    public function index()
    {
        $data['judul'] = 'Halaman Kategori';
        $data['kategori'] = $this->Kategori_model->getAllKategori();

        $this->load->view("templates/header.php", $data);
        $this->load->view("templates/templateatas.php");
        $this->load->view("kategori/index.php", $data);
        $this->load->view("templates/templatebawah.php");
        $this->load->view("templates/footer.php");
    }

    public function tambah()
    {
        $data["judul"] = "Form Tambah Data Kategori";

        // Rules untuk form_validation
        $this->form_validation->set_rules("deskripsi", "Deksripsi", "required");
        $this->form_validation->set_rules("kategori", "Kategori", "required");

        // CREATE || Pengkondisian form_validation, jika input salah, kembali ke view form input. jika input benar, menjalankan query untuk menambahkan data ke tabel mahasiswa lalu redirect dengan session, flashdata
        if ($this->form_validation->run() == FALSE) {
            $this->load->view("templates/header.php", $data);
            $this->load->view("templates/templateatas.php");
            $this->load->view("kategori/tambah.php");
            $this->load->view("templates/templatebawah.php");
            $this->load->view("templates/footer.php");
        } else {
            $this->Kategori_model->insertKategori();
            // flashdata, session flash dengan isi Ditambahkan
            $this->session->set_flashdata("flash", "Ditambahkan");
            // mengalihkan ke view mahasiswa
            redirect('kategori');
        }
    }

    public function hapus($id)
    {
        $this->Kategori_model->deleteKategori($id);
        $this->session->set_flashdata("flash", "Dihapus");
        redirect('kategori');
    }
}
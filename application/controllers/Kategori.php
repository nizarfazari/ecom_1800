<?php
class Kategori extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_Crud');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['kategori'] = $this->M_Crud->get_all_data('tbl_kategori')->result();
        $this->template->load('layout_admin', 'admin/kategori/index', $data);
    }

    public function add()
    {
        $this->template->load('layout_admin', 'admin/kategori/form_add');
    }

    public function save()
    {
        $this->form_validation->set_rules('namaKategori', 'Nama Kategori', 'required|min_length[5]');

        $this->form_validation->set_message('required', '%s masih kosong,silahkan isi');
        $this->form_validation->set_message('min_length', '{field} minimal 5 karakter');
        $this->form_validation->set_error_delimiters('<span class="help-block text-danger">', '</span>');
        if ($this->form_validation->run() == FALSE) {
            $this->template->load('layout_admin', 'admin/kategori/form_add');
        } else {
            $namaKategori = $this->input->post('namaKategori');
            $data = ['namakat' => $namaKategori];
            $this->M_Crud->insert('tbl_kategori', $data);
            redirect('kategori');
        }
    }

    public function edit($id)
    {
        $data = ['idkat' => $id];
        $data['kategori'] = $this->M_Crud->edit('tbl_kategori', $data)->row_object();
        $this->template->load('layout_admin', 'admin/kategori/form_edit', $data);
    }

    public function update()
    {
        $id = $this->input->post('id');
        $namaKategori = $this->input->post('namaKategori');
        $data = ['namakat' => $namaKategori];
        $this->M_Crud->update('tbl_kategori', $data, 'idkat', $id);
        if ($this->db->affected_rows()) {
            redirect('kategori');
        } else {
            echo "data gagal di update";
            redirect('kategori');
        }
    }

    public function delete($id)
    {
        $this->M_Crud->hapus('tbl_kategori', 'idkat', $id);
        if ($this->db->affected_rows()) {
            redirect('kategori');
        } else {
            echo "data gagal hapus";
        }
    }
}

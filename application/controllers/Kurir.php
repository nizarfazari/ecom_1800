<?php
class Kurir extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_Crud');
    }

    public function index()
    {
        $data['kurir'] = $this->M_Crud->get_all_data('tbl_kurir')->result();
        $this->template->load('layout_admin', 'admin/jasa_perjalanan/kurir/index', $data);
    }

    public function add()
    {
        $this->template->load('layout_admin', 'admin/jasa_perjalanan/kurir/form_add');
    }

    public function save()
    {
        $this->form_validation->set_rules('namaKurir', 'Nama Kategori', 'required|min_length[5]');

        $this->form_validation->set_message('required', '%s masih kosong,silahkan isi');
        $this->form_validation->set_message('min_length', '{field} minimal 5 karakter');
        $this->form_validation->set_error_delimiters('<span class="help-block text-danger">', '</span>');
        if ($this->form_validation->run() == FALSE) {
            $this->template->load('layout_admin', 'admin/jasa_perjalanan/kurir/form_add');
        } else {
            $namaKurir = $this->input->post('namaKurir');
            $data = ['namaKurir' => $namaKurir];
            $this->M_Crud->insert('tbl_kurir', $data);
            redirect('kurir');
        }
    }

    public function edit($id)
    {
        $data = ['idKurir' => $id];
        $data['kurir'] = $this->M_Crud->edit('tbl_kurir', $data)->row_object();
        $this->template->load('layout_admin', 'admin/jasa_perjalanan/kurir/form_edit', $data);
    }

    public function update()
    {
        $id = $this->input->post('id');
        $namaKurir = $this->input->post('namaKurir');
        $data = ['namaKurir' => $namaKurir];
        $this->M_Crud->update('tbl_kurir', $data, 'idKurir', $id);
        if ($this->db->affected_rows()) {
            redirect('kurir');
        } else {
            echo "data gagal di update";
            redirect('kurir');
        }
    }

    public function delete($id)
    {
        $this->M_Crud->hapus('tbl_kurir', 'idKurir', $id);
        if ($this->db->affected_rows()) {
            redirect('kurir');
        } else {
            echo "data gagal hapus";
        }
    }
}

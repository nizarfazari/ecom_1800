<?php
class Kota extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_Crud');
        if (empty($this->session->userdata('userName'))) {
            redirect('adminpanel');
        }
        $this->template->load('layout_admin', 'admin/dashboard');
    }

    public function index()
    {
        $data['kota'] = $this->M_Crud->get_all_data('tbl_kota')->result();
        $this->template->load('layout_admin', 'admin/jasa_perjalanan/kota/index', $data);
    }

    public function add()
    {
        $this->template->load('layout_admin', 'admin/jasa_perjalanan/kota/form_add');
    }

    public function save()
    {
        $this->form_validation->set_rules('namaKota', 'Nama Kategori', 'required|min_length[5]');

        $this->form_validation->set_message('required', '%s masih kosong,silahkan isi');
        $this->form_validation->set_message('min_length', '{field} minimal 5 karakter');
        $this->form_validation->set_error_delimiters('<span class="help-block text-danger">', '</span>');
        if ($this->form_validation->run() == FALSE) {
            $this->template->load('layout_admin', 'admin/jasa_perjalanan/kota/form_add');
        } else {
            $namaKota = $this->input->post('namaKota');
            $data = ['namaKota' => $namaKota];
            $this->M_Crud->insert('tbl_kota', $data);
            redirect('kota');
        }
    }

    public function edit($id)
    {
        $data = ['idKota' => $id];
        $data['kota'] = $this->M_Crud->edit('tbl_kota', $data)->row_object();
        $this->template->load('layout_admin', 'admin/jasa_perjalanan/kota/form_edit', $data);
    }

    public function update()
    {
        $id = $this->input->post('id');
        $namaKota = $this->input->post('namaKota');
        $data = ['namaKota' => $namaKota];
        $this->M_Crud->update('tbl_kota', $data, 'idKota', $id);
        if ($this->db->affected_rows()) {
            redirect('kota');
        } else {
            echo "data gagal di update";
            redirect('kota');
        }
    }

    public function delete($id)
    {
        $this->M_Crud->hapus('tbl_kota', 'idKota', $id);
        if ($this->db->affected_rows()) {
            redirect('kota');
        } else {
            echo "data gagal hapus";
        }
    }
}

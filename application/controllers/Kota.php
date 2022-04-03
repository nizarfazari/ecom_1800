<?php
class Kota extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_Crud');
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
        $namaKota = $this->input->post('namaKota');
        $data = ['namaKota' => $namaKota];
        $this->M_Crud->insert('tbl_kota', $data);
        redirect('kota');
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

<?php
class Kategori extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_Crud');
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
}

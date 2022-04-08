<?php
class Member extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('M_Crud');
    }

    public function index()
    {
        $data['member'] = $this->M_Crud->get_all_data('tbl_member')->result();
        $this->template->load('layout_admin', 'admin/member/index', $data);
    }

    public function update($id)
    {
        $status = $this->input->post('status');
        $data = ['statusAktif' => $status];
        $this->M_Crud->update('tbl_member', $data, 'idKonsumen', $id);
        if ($this->db->affected_rows()) {
            redirect('member');
        } else {
            echo "data gagal di update";
            redirect('member');
        }
    }
}

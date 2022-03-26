<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Adminpanel extends CI_Controller
{

    public function dashboard()
    {
        if (empty($this->session->userdata('userName'))) {
            redirect('adminpanel');
        }
        $this->template->load('layout_admin', 'admin/dashboard');
    }

    public function index()
    {
        $this->load->view('admin/form_login');
    }
}

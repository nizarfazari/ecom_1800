<?php
class Login extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('M_Login');
        $this->load->library('form_validation');
    }

    public function aksi_login()
    {
        $this->form_validation->set_rules('username', 'username', 'required|trim|min_length[5]');
        $this->form_validation->set_rules('password', 'password', 'required|trim|min_length[5]');

        $this->form_validation->set_message('is_unique', '{field} ini sudah di pakai,silahkan ganti');
        $this->form_validation->set_message('required', '%s masih kosong,silahkan isi');
        $this->form_validation->set_message('min_length', '{field} minimal 5 karakter');
        $this->form_validation->set_error_delimiters('<span class="help-block text-danger">', '</span>');
        if ($this->form_validation->run() == false) {
            $this->load->view('admin/form_login');
        } else {
            $u = $this->input->post('username');
            $p = $this->input->post('password');

            $cek = $this->M_Login->cek_login($u, $p)->num_rows();
            if ($cek == 1) {
                $data_session = [
                    'userName' => $u,
                    'status' => 'login'
                ];
                $this->session->set_userdata($data_session);
                redirect('adminpanel/dashboard');
            } else {
                redirect('adminpanel');
            }
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('adminpanel');
    }
}

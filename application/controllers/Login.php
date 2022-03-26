<?php
class Login extends CI_Controller
{
    public function aksi_login()
    {
        $this->load->model('M_Login');
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

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('adminpanel');
    }
}

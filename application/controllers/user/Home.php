<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_Crud');
        $this->load->model('M_Login');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->template->load('layout_member', 'member/home');
    }

    public function login()
    {
        $this->template->load('layout_member', 'member/login');
    }

    public function act_login()
    {
        $this->form_validation->set_rules('username', 'username', 'required|trim|min_length[5]');
        $this->form_validation->set_rules('password', 'password', 'required|trim|min_length[5]');

        $this->form_validation->set_message('is_unique', '{field} ini sudah di pakai,silahkan ganti');
        $this->form_validation->set_message('required', '%s masih kosong,silahkan isi');
        $this->form_validation->set_message('min_length', '{field} minimal 5 karakter');
        $this->form_validation->set_error_delimiters('<span class="help-block text-danger">', '</span>');
        if ($this->form_validation->run() == false) {
            $this->template->load('layout_member', 'member/login');
        } else {
            $u = $this->input->post('username');
            $p = $this->input->post('password');
            $data = ['username' => $u, 'password' => $p];
            $cek = $this->M_Login->cek_login('tbl_member', $data)->num_rows();
            $data2 =  $this->M_Crud->get_data_by_username('tbl_member', ['username' => $u])->row_object();
            if ($cek == 1) {
                $data_session = [
                    'id' => $data2->idKonsumen,
                    'username' => $u,
                    'status' => 'login',
                ];
                $this->session->set_userdata($data_session);
                redirect('user/home');
            } else {
                redirect('user/home/login');
            }
        }
    }

    public function register()
    {
        $data['kota'] = $this->M_Crud->get_all_data('tbl_kota')->result();
        $this->template->load('layout_member', 'member/register', $data);
    }

    public function act_register()
    {

        $this->form_validation->set_rules('nama', 'Nama', 'required|min_length[5]');
        $this->form_validation->set_rules('email', 'Email', 'required|min_length[5]');
        $this->form_validation->set_rules('username', 'username', 'required|min_length[5]');
        $this->form_validation->set_rules('password', 'password', 'required|min_length[5]');
        $this->form_validation->set_rules('alamat', 'alamat', 'required|min_length[5]');
        $this->form_validation->set_rules('no_telpon', 'no_telpon', 'required|min_length[5]');

        $this->form_validation->set_message('required', '%s masih kosong,silahkan isi');
        $this->form_validation->set_message('min_length', '{field} minimal 5 karakter');
        $this->form_validation->set_error_delimiters('<span class="help-block text-danger">', '</span>');
        if ($this->form_validation->run() == FALSE) {
            $this->template->load('layout_member', 'member/register');
        } else {
            $nama = $this->input->post('nama');
            $email = $this->input->post('email');
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $alamat = $this->input->post('alamat');
            $idKota = $this->input->post('idKota');
            $tlpn = $this->input->post('no_telpon');
            $data = [
                'namaKonsumen' => $nama,
                'email' =>  $email,
                'username' => $username,
                'password' => $password,
                'alamat' => $alamat,
                'idKota' => $idKota,
                'tlpn' => $tlpn
            ];
            $this->M_Crud->insert('tbl_member', $data);
            redirect('user/home/login');
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('user/home/login');
    }
    public function toko()
    {
        $data['toko'] = $this->M_Crud->get_all_data('tbl_toko')->result();
        $this->template->load('layout_member', 'member/toko/index', $data);
    }

    public function create_toko()
    {

        $this->template->load('layout_member', 'member/toko/create');
    }

    public function store_toko()
    {
        $this->form_validation->set_rules('namaToko', 'Nama', 'required');
        $this->form_validation->set_rules('deskripsi', 'deskripsi', 'required');


        $config['upload_path'] = './gambar/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '10000'; //maksimal ukuran
        $config['max_width'] = '10000'; //lebar maksimal
        $config['max_height'] = '10000'; //tinggi maksimal
        $this->load->library('upload', $config);

        $this->form_validation->set_message('required', '%s masih kosong,silahkan isi');
        $this->form_validation->set_message('min_length', '{field} minimal 8 karakter');
        $this->form_validation->set_error_delimiters('<span class="help-block text-danger">', '</span>');
        var_dump($this->upload->do_upload('gambar'));

        if ($this->form_validation->run() == false) {
            $this->template->load('layout_member', 'member/toko/create');
        } else {
            if (!$this->upload->do_upload('gambar')) {
                echo "masukan gambar terlebih dahulu";
            } else {
                $gambar  = $this->upload->data();
                $gambar = $gambar['file_name'];
                $namaToko = $this->input->post('namaToko');
                $deskripsi = $this->input->post('deskripsi');

                $data = [
                    'idKonsumen' => $this->session->userdata('id'),
                    'namaToko' => $namaToko,
                    'deskripsi' => $deskripsi,
                    'logo' => $gambar,
                ];

                $this->M_Crud->insert('tbl_toko', $data);
                if ($this->db->affected_rows()) {
                    redirect('user/home');
                } else {
                    redirect('user/home/tambah');
                }
            }
        }
    }
}

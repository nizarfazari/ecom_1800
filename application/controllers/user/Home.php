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
        $status = $this->session->userdata('status');
        if (empty($status)) {
            redirect('user/auth/login');
        }
    }

    public function index()
    {
        $data['produks'] = $this->M_Crud->get_limit_data('tbl_produk')->result();
        $this->template->load('layout_member', 'member/home', $data);
    }

    public function dashboard()
    {
        $this->template->load('layout_member', 'member/dashboard');
    }

    public function keranjang()
    {
        $data['kategori'] = $this->M_Crud->get_all_data('tbl_kategori')->result();
        $this->template->load('layout_member', 'member/keranjang', $data);
    }
    public function tambah_keranjang($id)
    {
        $find_id = ["idProduk" => $id];
        $jml_keranjang = count($this->cart->contents());
        if (empty($jml_keranjang)) {
            $data_produk = $this->M_Crud->get_data_by_id('tbl_produk', $find_id)->row_object();

            $insert_cart = [
                'id' => $id,
                'idToko' => $data_produk->idToko,
                'name' => $data_produk->namaProduk,
                'price' => $data_produk->harga,
                'gambar' => $data_produk->foto,
                'qty' => 1
            ];

            $this->cart->insert($insert_cart);
            redirect('user/home/keranjang');
        } else {
            $idToko = '';
            if ($cart = $this->cart->contents()) {
                foreach ($cart as $item) {
                    $idToko = $item['idToko'];
                }
            }

            $data_produk = $this->M_Crud->get_data_by_id('tbl_produk', $find_id)->row_object();

            if ($idToko == $data_produk->idToko) {
                $data_produk = $this->M_Crud->get_data_by_id('tbl_produk', $find_id)->row_object();
                $insert_cart = [
                    'id' => $id,
                    'idToko' => $data_produk->idToko,
                    'name' => $data_produk->namaProduk,
                    'price' => $data_produk->harga,
                    'gambar' => $data_produk->foto,
                    'qty' => 1
                ];
                $this->cart->insert($insert_cart);
                redirect('user/home/keranjang');
            } else {
                echo "Barang harus dari toko yang sama";
            }
        }
    }

    public function hapus_cart($rowid)
    {
        $data_hapus = [
            'rowid' => $rowid,
            'qty' => 0
        ];
        $this->cart->update($data_hapus);
        redirect('user/home');
    }

    public function selesai_belanja()
    {
        $idToko = '';

        if ($cart = $this->cart->contents()) {
            foreach ($cart as $item) {
                $idToko = $item['idToko'];
            }
        }

        $data_pembeli = [
            'idKonsumen' => $this->session->userdata('id'),
            'tglOrder' => date('Y-m-d'),
            'idToko' => $idToko,
            'statusOrder' => 'Belum Bayar'
        ];

        $idTerakhir = $this->M_Crud->insert('tbl_order', $data_pembeli);


        if ($cart = $this->cart->contents()) {
            foreach ($cart as $item) {
                $data_detail = [
                    'idOrder' => $idTerakhir,
                    'idProduk' => $item['id'],
                    'jumlah' => $item['qty'],
                    'harga' => $item['price']
                ];
                $this->M_Crud->insert('tbl_detail_order', $data_detail);
            }
            $this->cart->destroy();
            redirect('user/home/transaksi');
        }
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

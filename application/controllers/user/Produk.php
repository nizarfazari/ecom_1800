 
 <?php
    defined('BASEPATH') or exit('No direct script access allowed');

    class Produk extends CI_Controller
    {
        function __construct()
        {
            parent::__construct();
            $this->load->model('M_Crud');
            $this->load->library('form_validation');
        }
        public function index($id)
        {
            $find_id = ["idToko" => $id];
            $data['toko'] = $this->M_Crud->get_data_by_id('tbl_toko', $find_id)->row_object();
            $data['produk'] = $this->M_Crud->get_all_data('tbl_produk')->result();
            $this->template->load('layout_member', 'member/toko/produk/index', $data);
        }

        public function create($id)
        {
            $data['idToko'] = $id;
            $data['kategori'] = $this->M_Crud->get_all_data('tbl_kategori')->result();
            $this->template->load('layout_member', 'member/toko/produk/create', $data);
        }

        public function store_produk()
        {
            $config['upload_path'] = './gambar/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '10000'; //maksimal ukuran
            $config['max_width'] = '10000'; //lebar maksimal
            $config['max_height'] = '10000'; //tinggi maksimal
            $this->load->library('upload', $config);
            $idToko = $this->input->post('idToko');

            if (!$this->upload->do_upload('gambar')) {
                echo "masukan gambar terlebih dahulu";
                redirect('user/produk/create/' . $idToko);
            } else {
                $gambar  = $this->upload->data();
                $gambar = $gambar['file_name'];
                $idKategori = $this->input->post('idKategori');
                $namaProduk = $this->input->post('namaProduk');
                $harga = $this->input->post('harga');
                $stok = $this->input->post('stok');
                $berat = $this->input->post('berat');
                $deskripsi = $this->input->post('deskripsi');


                $data = [
                    'idKat' => $idKategori,
                    'idToko' => $idToko,
                    'namaProduk' => $namaProduk,
                    'foto' => $gambar,
                    'harga' => $harga,
                    'stok' => $stok,
                    'berat' => $berat,
                    'deskripsiProduk' => $deskripsi,
                ];

                $this->M_Crud->insert('tbl_produk', $data);
                if ($this->db->affected_rows()) {
                    redirect('user/produk/index/' . $idToko);
                } else {
                    redirect('user/produk/create/' . $idToko);
                }
            }
        }
    }



    ?>
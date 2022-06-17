<?php
class ongkir extends CI_Controller
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

        $data['ongkir'] = $this->M_Crud->join_table('tbl_biaya_kirim bk', 'tbl_kurir k', 'bk.idKurir=k.idKurir', 'tbl_kota a', 'bk.idKotaAsal = a.idKota', 'tbl_kota b', 'bk.idKotaTujuan = b.idKota', '*,namaKurir,a.namaKota AS asal,b.namaKota AS tujuan,biaya')->result();
        $this->template->load('layout_admin', 'admin/jasa_perjalanan/ongkir/index', $data);
    }

    public function add()
    {
        $data['kota'] = $this->M_Crud->get_all_data('tbl_kota')->result();
        $data['kurir'] = $this->M_Crud->get_all_data('tbl_kurir')->result();
        $this->template->load('layout_admin', 'admin/jasa_perjalanan/ongkir/form_add', $data);
    }

    public function save()
    {
        $idKurir = $this->input->post('idKurir');
        $idKotaAsal = $this->input->post('idKotaAsal');
        $idKotaTujuan = $this->input->post('idKotaTujuan');
        $biaya = $this->input->post('biaya');
        $data = [
            'idKurir' => $idKurir,
            'idKotaAsal' => $idKotaAsal,
            'idKotaTujuan' => $idKotaTujuan,
            'biaya' => $biaya
        ];
        $this->M_Crud->insert('tbl_biaya_kirim', $data);
        redirect('ongkir');
    }

    public function edit($id)
    {
        $id = ['idBiayaKirim' => $id];
        $data['kota'] = $this->M_Crud->get_all_data('tbl_kota')->result();
        $data['kurir'] = $this->M_Crud->get_all_data('tbl_kurir')->result();
        $data['ongkir'] = $this->M_Crud->edit_join('tbl_biaya_kirim bk', 'tbl_kurir k', 'bk.idKurir=k.idKurir', 'tbl_kota a', 'bk.idKotaAsal = a.idKota', 'tbl_kota b', 'bk.idKotaTujuan = b.idKota', $id)->row_object();
        $this->template->load('layout_admin', 'admin/jasa_perjalanan/ongkir/form_edit', $data);
    }

    public function update()
    {
        $id = $this->input->post('id');
        $idKurir = $this->input->post('idKurir');
        $idKotaAsal = $this->input->post('idKotaAsal');
        $idKotaTujuan = $this->input->post('idKotaTujuan');
        $biaya = $this->input->post('biaya');
        $data = [

            'idKurir' => $idKurir,
            'idKotaAsal' => $idKotaAsal,
            'idKotaTujuan' => $idKotaTujuan,
            'biaya' => $biaya

        ];
        $this->M_Crud->update('tbl_biaya_kirim', $data, 'idBiayaKirim', $id);
        if ($this->db->affected_rows()) {
            redirect('ongkir');
        } else {
            echo "data gagal di update";
            redirect('ongkir');
        }
    }

    public function delete($id)
    {
        $this->M_Crud->hapus('tbl_biaya_kirim', 'idBiayaKirim', $id);
        if ($this->db->affected_rows()) {
            redirect('ongkir');
        } else {
            echo "data gagal hapus";
        }
    }
}

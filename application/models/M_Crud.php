<?php
class M_Crud extends CI_Model
{
    public function get_all_data($table)
    {
        return $this->db->get($table);
    }

    public function get_limit_data($table)
    {
        $this->db->order_by('idProduk', 'DESC');
        $this->db->limit(4);
        return $this->db->get($table);
    }
    public function get_data_by_username($table, $user)
    {
        return $this->db->get_where($table, $user);
    }

    public function get_data_by_id($table, $id)
    {
        return $this->db->get_where($table, $id);
    }

    public function insert($table, $data)
    {
        $this->db->insert($table, $data);
    }

    public function edit($tabel, $id)
    {
        return $this->db->get_where($tabel, $id);
    }

    public function update($tabel, $data, $pk, $id)
    {
        $this->db->where($pk, $id);
        $this->db->update($tabel, $data);
    }

    public function hapus($table, $pk, $id)
    {
        $this->db->where($pk, $id);
        $this->db->delete($table);;
    }

    public function join_table($table, $tbljoin, $q, $tbljoin2, $q2, $tbljoin3, $q3)
    {
        $this->db->select('*,namaKurir,a.namaKota AS asal,b.namaKota AS tujuan,biaya');
        $this->db->join($tbljoin, $q)->join($tbljoin2, $q2,)->join($tbljoin3, $q3);
        return $this->db->get($table);
    }

    public function edit_join($table, $tbljoin, $q, $tbljoin2, $q2, $tbljoin3, $q3, $id)
    {
        $this->db->select('*,namaKurir,a.namaKota AS asal,b.namaKota AS tujuan,biaya');
        $this->db->join($tbljoin, $q)->join($tbljoin2, $q2,)->join($tbljoin3, $q3);
        return $this->db->get_where($table, $id);
    }

    public function find($id)
    {
        $result = $this->db->where('idProduk', $id)->limit(1)->get('tbl_produk');
        if ($result->num_rows() > 0) {
            return $result->row();
        } else {
            return array();
        }
    }
}

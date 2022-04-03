<?php
class M_Crud extends CI_Model
{
    public function get_all_data($table)
    {
        return $this->db->get($table);
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

    public function edit_join($tbljoin, $q, $tbljoin2, $q2, $tabel, $id)
    {
        $this->db->join($tbljoin, $q)->join($tbljoin2, $q2);
        return $this->db->get_where($tabel, $id);
    }
}

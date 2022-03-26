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
}

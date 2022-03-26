<?php
class M_Crud extends CI_Model
{
    public function get_all_data($table)
    {
        return $this->db->get($table);
    }
}

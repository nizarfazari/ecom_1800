<?php
class M_Login extends CI_Model
{
    public function cek_login($u, $p)
    {

        $q = $this->db->get_where('tbl_admin', ['userName' => $u, 'password' => $p]);
        return $q;
    }
}

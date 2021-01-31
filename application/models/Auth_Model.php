<?php

class Auth_Model extends CI_Model
{
    public function getUser($username, $password)
    {
        $this->db->where('username', $username)
                 ->where('password', $password);
        $result = $this->db->get('admin')->row();
        return $result;
    }
}

?>
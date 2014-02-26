<?php

class Admins_Model extends CI_Model {
    public function get_admins($adminID = FALSE) {

        if ($adminID === FALSE) {
            $query = $this->db->get('adminlogins');
            return $query->result_array();
        }

        $query = $this->db->get_where('adminlogins', array('adminID' => $adminID));

        return $query->row();
    }
    
    public function set_admins($data) {
        return $this->db->insert('adminlogins', $data);
    }
}


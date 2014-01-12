<?php

class Users_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    public function get_users($userID = FALSE) {
        if ($userID === FALSE) {
            $query = $this->db->get('users');
            return $query->result_array();
        }

        $query = $this->db->get_where('users', array('id' => $userID));
        return $query->row_array();
    }

    public function set_users() {
        $data = array(
            'firstName' => $this->input->post('fname'),
            'lastName' => $this->input->post('lname'),
            'address' => $this->input->post('address'),
            'dateOfBirth' => $this->input->post('dateofbirth'),
            'phoneNumber' => $this->input->post('phone'),
            'email' => $this->input->post('email')
        );

        return $this->db->insert('users', $data);
    }
}

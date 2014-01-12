<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class checkBooking extends CI_Controller {

    public function __construct() {

        parent::__construct();
    }

    public function index() {
        $ref = $_POST['ref'];
        $DoB = $_POST['dob'];

        $row = $this->db->get_where("booking", array("ref" => $ref))->row_array();

        echo json_encode($row);
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
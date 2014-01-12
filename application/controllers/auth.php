<?php

class Auth extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('users_model');
    }

    public function index() {
        
    }

    public function login() {
        $this->load->helper('form');
        $users = $this->users_model->get_users();

        $refNum = $this->input->post('ref');
        $dob = $this->input->post('dob');
        $data['title'] = ucfirst('Home'); // Capitalize the first letter

        foreach ($users as $users_item) {
            if ($users_item['ref'] === $refNum && $users_item['dateOfBirth'] === $dob) {
                $data['login'] = true;
                $this->load->view('templates/header', $data);
                $this->load->view('pages/home', $data);
                $this->load->view('templates/footer');
                break;
            }
        }


    }
}

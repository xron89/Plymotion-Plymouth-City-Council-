<?php

class Users extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('users_model');
    }

    public function index() {
        $data['users'] = $this->users_model->get_users();
        $data['title'] = 'New Contacts';

        $this->load->view('templates/header', $data);
        $this->load->view('pages/new_contacts', $data);
        $this->load->view('templates/footer');
    }

    public function viewUser($userID) {
        $data['users'] = $this->users_model->get_users($userID);
    }
    
    public function register() {
        $this->load->helper('form');
        //$this->load->library('form_validation');

        $data['title'] = 'Register';

        //$this->form_validation->set_rules('fname', 'First Name', 'required');
        //$this->form_validation->set_rules('lname', 'Surname', 'required');
        //$this->form_validation->set_rules('address', 'Address', 'required');
        //$this->form_validation->set_rules('dateofbirth', 'DOB', 'required');
        //$this->form_validation->set_rules('phone', 'Phone No.', 'required');
        //$this->form_validation->set_rules('email', 'Email', 'required');

        //if ($this->form_validation->run() === FALSE) {
        //    $this->load->view('templates/header', $data);
        //    $this->load->view('pages/booking');
        //    $this->load->view('templates/footer');
        //} else {
            $data['register'] = "You have successfully registered";
            $this->users_model->set_users();
            $this->load->view('templates/header', $data);
            $this->load->view('pages/home', $data);
            $this->load->view('templates/footer');
        //}
    }

    public function login() {
        
    }
}

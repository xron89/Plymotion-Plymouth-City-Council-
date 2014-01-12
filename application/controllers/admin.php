<?php

class Admin extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model('clients_model');
    }
    
    public function newContacts() {
        $data['clients'] = $this->clients_model->get_clients();

        $data['title'] = 'New Contacts';

        $this->load->view('templates/header', $data);
        $this->load->view('pages/new_contacts', $data);
        $this->load->view('templates/footer');
    }
    
    public function clients() {
        
    }
    
    public function client($clientID) {
        
    }
    
}

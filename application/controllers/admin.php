<?php

class Admin extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model('clients_model');
        $this->load->model('admin_model');
        $this->load->library('encrypt');
    }
    
    public function index($data, $page) {
        $this->load->view('templates/header', $data);
        $this->load->view('pages/modals/adminAffix');
        $this->load->view('pages/admin/' . $page, $data);
        $this->load->view('templates/footer');
    }
    
    public function newClients() {
        $data['title'] = 'New Clients';
        $data['clients'] = $this->clients_model->get_new_clients();

        $this->index($data, 'new_clients');
    }
    
    public function home() {
        $data['title'] = 'Admin Home';

        $this->index($data, 'admin_home');
    }
    
    public function adminManagment() {
        $data['title'] = 'Admin Managment';
        $data['clients'] = $this->admin_model->get_admins();

        $this->index($data, 'admin_managment');
    }
    
    public function newAdmin() {
        $data['title'] = 'Admin Managment';
        $page = 'admin_managment';
        
        if ($this->dupeCheck($this->input->post('username'))) {
            $data['register'] = 'false';
            $data['regError'] = 'This username has already been used.\n '
                    . 'Please try again with another username';
            $this->index($data, $page);
        } else {

            $encriptPas = $this->encrypt->encode($this->input->post('password'));

            $adminData = array(
                'username' => $this->input->post('username'),
                'password' => $encriptPas,
                'admin' => 1,
            );

            if ($this->admin_model->set_admins($adminData)) {
                $data['register'] = 'true';
                $this->index($data, $page);
            } else {
                $data['register'] = 'false';
                $data['regError'] = "Unable to register you please try again.\n"
                        . "If this problem continues please contact an administrator";
                $this->index($data, $page);
            }
        }
    }
    
    private function dupeCheck($username) {
        $admins = $this->admin_model->get_admins();

        foreach ($admins as $admin) {
            if ($admin['username'] === $username) {
                return true;
            }
        }

        return false;
    }
}

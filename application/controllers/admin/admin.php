<?php

class Admin extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model('clients_model');
        $this->load->model('admins_model');
        $this->load->model('venues_model');
        $this->load->library('encrypt');
    }

    public function index($data, $page) {
        if ($this->authCheck()) {
            $data['title'] = "Home";
            $data['authCheck'] = "false";
            $data['authMessage'] = "You are not authorised to view that page";

            $this->load->view('templates/header', $data);
            $this->load->view('pages/home', $data);
            $this->load->view('templates/footer');
        } else {
            $this->load->view('templates/header', $data);
            $this->load->view('pages/admin/adminAffix');
            $this->load->view('pages/admin/' . $page, $data);
            $this->load->view('templates/footer');
        }
    }

    public function home() {
        $data['title'] = 'Admin Home';

        $this->index($data, 'admin_home');
    }

    public function newClients() {
        $data['title'] = 'New Clients';
        $data['clients'] = $this->clients_model->get_new_clients();

        $this->index($data, 'new_clients');
    }

    public function adminManagment() {
        $data['title'] = 'Admin Managment';
        $data['admins'] = $this->admins_model->get_admins();

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
                'admin' => 1
            );

            if ($this->admins_model->set_admins($adminData)) {
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

    public function venueManagment() {
        $data['title'] = 'Venue Managment';
        $data['venues'] = $this->venues_model->get_venues();

        $this->index($data, 'venue_managment');
    }

    public function newVenue() {
        $data['title'] = 'Venue Managment';
        $page = 'venue_managment';

        $venueData = array(
            'name' => $this->input->post('name'),
            'opening' => $this->input->post('opening'),
            'address' => $this->input->post('address'),
            'phone' => $this->input->post('phone'),
            'email' => $this->input->post('email'),
            'website' => $this->input->post('website'),
            'mapLink' => $this->input->post('mapLink')
        );
        
        $venueID = $this->venues_model->set_venues($venueData);
        
        $venueFacilitesData = array(
            'venueID' => $venueID,
            'toilets' => $this->input->post('toilets'),
            'bikePark' => $this->input->post('bikePark'),
            'changing' => $this->input->post('changing'),
            'lockers' => $this->input->post('lockers'),
            'carPark' => $this->input->post('carPark'),
            'refreshments' => $this->input->post('refreshments')
        );
        
        $this->venues_model->set_venueFacilites($venueFacilitesData);
        
        $data['venues'] = $this->venues_model->get_venues();
        
        $this->index($data, $page);
    }

    private function dupeCheck($username) {
        $admins = $this->admins_model->get_admins();

        foreach ($admins as $admin) {
            if ($admin['username'] === $username) {
                return true;
            }
        }

        return false;
    }

    private function authCheck() {
        if ($this->session->userdata('logged_in')) {
            if ($this->session->userdata('auth') != "admin" || $this->session->userdata('auth') != "instructor") {
                return false;
            }
        }
        return true;
    }

}

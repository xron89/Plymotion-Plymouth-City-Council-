<?php

class Users extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model('clients_model');
        $this->load->model('admins_model');
        $this->load->model('instructors_model');
        $this->load->model('courses_model');
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

    public function instructorManagment() {
        $data['title'] = 'Instructor Managment';
        $data['instructors'] = $this->instructors_model->get_instructors();

        $this->index($data, 'instructor_managment');
    }

    public function clientManagment() {
        $data['title'] = 'Client Managment';
        $data['clients'] = $this->clients_model->get_clients();

        $this->index($data, 'client_managment');
    }

    public function manageClients() {
        $action = $this->input->post('action');
        $selected = $this->input->post('selected');

        if ($selected == null) {
            $error = "Please select one entry or use the bulk delete option.";
            $this->clientManagment();
        } else {
            $userID = $selected[0];

            $this->userProfile($userID);
        }
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

    private function userProfile($userID) {
        $user = $this->clients_model->get_clients($userID);
        $data['user'] = $user;

        if ($this->session->userdata('auth') === "user") {
            $data['title'] = 'Your Profile';

            $this->load->view('templates/header', $data);
            $this->load->view('pages/client/client_profile', $data);
            $this->load->view('templates/footer');
        } else if ($this->session->userdata('auth') === "admin") {
            $data['title'] = $user->firstName . " " . $user->lastName . "'s Profile";
            $bookings = $this->courses_model->get_clientBookings($userID);
            $data['bookings'] = $bookings;
            $data['locations'] = $this->venues_model->get_locations();
            $data['venues'] = $this->venues_model->get_venues();
            $data['instructors'] = $this->instructors_model->get_instructors();

            $this->load->view('templates/header', $data);
            $this->load->view('pages/admin/adminAffix');
            $this->load->view('pages/client/client_profile', $data);
            $this->load->view('templates/footer');
        } else {
            $data['title'] = "Home";
            $data['authCheck'] = "false";
            $data['authMessage'] = "You are not authorised to view that page";

            $this->load->view('templates/header', $data);
            $this->load->view('pages/home', $data);
            $this->load->view('templates/footer');
        }
    }

}

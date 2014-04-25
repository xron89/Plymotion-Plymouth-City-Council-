<?php

class Admin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        
        $this->load->library('encrypt');
        
        $this->load->model('clients_model');
        $this->load->model('courses_model');
        $this->load->model('venues_model');
        $this->load->model('news_model');
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
        $data['contacts'] = $this->clients_model->get_new_clients();
        $data['courses'] = $this->courses_model->get_top5courses();
        $data['clientCount'] = $this->clients_model->count_clients();
        $data['venueCount'] = $this->venues_model->count_venues();
        $data['postCount'] = $this->news_model->count_posts();

        $this->index($data, 'admin_home');
    }
    
    public function newsManagment() {
        $data['title'] = 'News Managment';
        $data['news'] = $this->news_model->get_news();
        
        $this->index($data, 'news_managment');
    }
    
    public function addNews() {
        
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
